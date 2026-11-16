<script setup>
import { ref, computed, watch, nextTick, onMounted } from 'vue';
import TreeNode from './components/TreeNode.vue';
import FileView from './components/FileView.vue';
import Skeleton from './components/Skeleton.vue';
import { pathOf, expandTo } from './utils';

const data = ref(null);
const loadError = ref(false);
const openTabs = ref([]);
const current = ref(null);
const filter = ref('');
const sidebarOpen = ref(false);
const viewEl = ref(null);

const query = computed(() => filter.value.toLowerCase());
const path = computed(() =>
    data.value && current.value ? pathOf(current.value, data.value.tree, data.value.files) : []
);

onMounted(() => {
    load();
    window.addEventListener('hashchange', () => {
        const id = location.hash.slice(1);
        if (data.value?.files[id] && id !== current.value) show(id);
    });
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') sidebarOpen.value = false;
    });
});

async function load() {
    loadError.value = false;
    try {
        const url = document.getElementById('app')?.dataset.portfolioUrl || '/api/portfolio';
        const res = await fetch(url);
        const payload = await res.json();
        if (!payload?.files) throw new Error('bad payload');
        data.value = payload;
        const initial = location.hash.slice(1);
        show(payload.files[initial] ? initial : 'readme');
    } catch {
        loadError.value = true;
    }
}

function show(id) {
    current.value = id;
    if (!openTabs.value.includes(id)) openTabs.value.push(id);
    expandTo(data.value.tree, pathOf(id, data.value.tree, data.value.files));
    sidebarOpen.value = false;
    if (location.hash.slice(1) !== id) history.replaceState(null, '', '#' + id);
}

function closeTab(id) {
    const i = openTabs.value.indexOf(id);
    openTabs.value.splice(i, 1);
    if (current.value !== id) return;
    openTabs.value.length ? show(openTabs.value[Math.max(0, i - 1)]) : show('readme');
}

watch(current, async () => {
    await nextTick();
    if (viewEl.value) {
        viewEl.value.scrollTop = 0;
        viewEl.value.focus({ preventScroll: true });
    }
});

// Keyboard: arrows move through the tree, right/left open and close folders
function onTreeKey(e) {
    const rows = [...e.currentTarget.querySelectorAll('.row')].filter((r) => r.offsetParent);
    const i = rows.indexOf(document.activeElement);
    if (i < 0) return;
    const expanded = document.activeElement.parentElement.getAttribute('aria-expanded');
    if (e.key === 'ArrowDown') { rows[i + 1]?.focus(); e.preventDefault(); }
    else if (e.key === 'ArrowUp') { rows[i - 1]?.focus(); e.preventDefault(); }
    else if (e.key === 'ArrowRight' && expanded === 'false') document.activeElement.click();
    else if (e.key === 'ArrowLeft' && expanded === 'true') document.activeElement.click();
}
</script>

<template>
    <Skeleton v-if="!data && !loadError" />
    <div v-else-if="loadError" class="win sk-win">
        <aside aria-hidden="true">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="brand"><b>K</b>Portfolio</div>
        </aside>
        <main>
            <div class="top"><div class="crumb">portfolio</div></div>
            <section class="view">
                <div class="load-error">
                    <p class="eyebrow">Connection</p>
                    <h1>Couldn't load the portfolio.</h1>
                    <p class="mute">The data request failed. Check your connection and try again.</p>
                    <div class="cta"><button class="btn" @click="load">Retry</button></div>
                </div>
            </section>
        </main>
    </div>
    <div v-else class="win">
        <a class="skip" href="#main-content">Skip to content</a>
        <div v-if="sidebarOpen" class="backdrop" aria-hidden="true" @click="sidebarOpen = false"></div>
        <aside :class="{ open: sidebarOpen }" aria-label="Portfolio explorer">
            <div class="dots" aria-hidden="true"><i></i><i></i><i></i></div>
            <div class="brand">
                <b>{{ data.owner.name[0] }}</b>Portfolio
                <button class="menu-close" aria-label="Close file explorer" @click="sidebarOpen = false">✕</button>
            </div>
            <input v-model.trim="filter" class="find" type="search" placeholder="Filter files…" aria-label="Filter files" />
            <ul class="tree" role="tree" aria-label="Files" @keydown="onTreeKey">
                <TreeNode
                    v-for="n in data.tree"
                    :key="n.id || n.name"
                    :node="n"
                    :files="data.files"
                    :current="current"
                    :filter="query"
                    @select="show"
                />
            </ul>
            <div class="me">
                <div class="av">
                    <img v-if="data.owner.photo" :src="data.owner.photo" :alt="data.owner.name" />
                    <template v-else>{{ data.owner.name.split(' ').map((w) => w[0]).join('') }}</template>
                </div>
                <div>
                    <b>{{ data.owner.name }}</b>
                    <small>{{ data.owner.role }}</small>
                    <small>{{ data.owner.status }}</small>
                </div>
            </div>
        </aside>

        <main id="main-content">
            <div class="top">
                <button class="icon menu" aria-label="Open file explorer" @click="sidebarOpen = !sidebarOpen">Files</button>
                <div class="crumb">
                    <template v-for="(part, i) in path" :key="i">
                        <b v-if="i === path.length - 1">{{ part }}</b>
                        <template v-else>{{ part }} / </template>
                    </template>
                </div>
            </div>

            <div class="tabs" role="tablist" aria-label="Open files">
                <div
                    v-for="(id, i) in openTabs"
                    :key="id"
                    class="tab"
                    :style="{ '--z': 20 - i }"
                    role="tab"
                    tabindex="0"
                    :aria-selected="id === current"
                    @click="show(id)"
                    @keydown.enter="show(id)"
                >
                    <span aria-hidden="true">{{ data.files[id].icon }}</span>{{ data.files[id].title }}
                    <button class="x" :aria-label="'Close ' + data.files[id].title" @click.stop="closeTab(id)">✕</button>
                </div>
            </div>

            <section ref="viewEl" class="view" tabindex="-1" aria-live="polite">
                <FileView :file="data.files[current]" :files="data.files" @go="show" />
            </section>

            <div class="status">
                <i></i><span>{{ data.owner.available }}</span>
                <span class="k" style="margin-left: auto">
                    <kbd>↑</kbd> <kbd>↓</kbd> move — <kbd>→</kbd> <kbd>←</kbd> open or close folder — <kbd>Enter</kbd> open file
                </span>
            </div>
        </main>
    </div>
</template>
