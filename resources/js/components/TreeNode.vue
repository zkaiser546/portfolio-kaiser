<script setup>
import { hasMatch, countFiles } from '../utils';

defineProps({
    node: { type: Object, required: true },
    files: { type: Object, required: true },
    current: String,
    filter: { type: String, default: '' },
});
const emit = defineEmits(['select']);
</script>

<template>
    <li
        v-if="hasMatch(node, files, filter)"
        role="treeitem"
        :aria-expanded="node.kids ? (filter ? true : !!node.open) : undefined"
    >
        <button v-if="node.kids" class="row" @click="node.open = !node.open">
            <span class="chev">›</span>📁 {{ node.name }}
            <span class="n">{{ countFiles(node) }}</span>
        </button>
        <button v-else class="row" :aria-selected="node.id === current" @click="emit('select', node.id)">
            {{ files[node.id].icon }} {{ files[node.id].title }}
        </button>

        <ul v-if="node.kids" role="group">
            <TreeNode
                v-for="k in node.kids"
                :key="k.id || k.name"
                :node="k"
                :files="files"
                :current="current"
                :filter="filter"
                @select="emit('select', $event)"
            />
        </ul>
    </li>
</template>
