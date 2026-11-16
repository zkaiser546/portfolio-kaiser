<script setup>
defineProps({
    file: { type: Object, default: null },
    files: { type: Object, required: true },
});
const emit = defineEmits(['go']);
</script>

<template>
    <div v-if="file">
        <!-- README / home -->
        <template v-if="file.kind === 'home'">
            <header class="hero">
                <div>
                    <p class="eyebrow">Portfolio · 2026</p>
                    <h1>{{ file.headline }}</h1>
                    <p class="lead">{{ file.intro }}</p>
                    <div class="cta">
                        <button v-for="c in file.cta" :key="c.go" :class="['btn', { ghost: !c.primary }]" @click="emit('go', c.go)">
                            {{ c.label }}
                        </button>
                    </div>
                </div>
                <dl v-if="file.meta" class="hero-meta">
                    <div v-for="m in file.meta" :key="m[0]">
                        <dt>{{ m[0] }}</dt>
                        <dd :class="{ hot: m[2] }">{{ m[1] }}</dd>
                    </div>
                </dl>
            </header>

            <div class="strip">
                <div v-for="s in file.stats" :key="s[1]"><b>{{ s[0] }}</b><span>{{ s[1] }}</span></div>
            </div>

            <h2>Selected work</h2>
            <div class="projects">
                <button v-for="id in file.featured" :key="id" class="prow" @click="emit('go', id)">
                    <span class="pthumb" :style="files[id].thumb ? null : { background: files[id].cover }">
                        <img v-if="files[id].thumb" :src="files[id].thumb" :alt="files[id].title" />
                        <span v-else>{{ files[id].icon }}</span>
                    </span>
                    <span>
                        <b class="pt">{{ files[id].title }}</b>
                        <span class="ps">{{ files[id].summary }}</span>
                        <span class="pk"><span v-for="t in files[id].tags" :key="t" class="chip mono">{{ t }}</span></span>
                    </span>
                    <span class="parrow">→</span>
                </button>
            </div>

            <h2>How to read this portfolio</h2>
            <p class="mute">{{ file.howto }}</p>
        </template>

        <!-- Case study -->
        <template v-else-if="file.kind === 'case'">
            <!-- Portrait app shot: phone mockup beside the title -->
            <div v-if="file.coverImage && file.phoneFrame" class="case-hero">
                <div class="phone">
                    <span class="phone-notch" aria-hidden="true"></span>
                    <img class="phone-screen" :src="file.coverImage" :alt="file.title" />
                    <span class="phone-bar" aria-hidden="true"></span>
                </div>
                <div class="case-hero-body">
                    <p class="eyebrow">{{ file.title }}</p>
                    <h1 class="wide">{{ file.summary }}</h1>
                    <div class="meta">
                        <span v-for="t in file.tags" :key="t" class="chip">{{ t }}</span>
                    </div>
                </div>
            </div>
            <!-- Desktop shot: monitor mockup beside the title -->
            <div v-else-if="file.coverImage && file.pcFrame" class="case-hero">
                <div class="monitor">
                    <div class="monitor-bezel">
                        <img :src="file.coverImage" :alt="file.title" />
                    </div>
                    <div class="monitor-neck" aria-hidden="true"></div>
                    <div class="monitor-foot" aria-hidden="true"></div>
                </div>
                <div class="case-hero-body">
                    <p class="eyebrow">{{ file.title }}</p>
                    <h1 class="wide">{{ file.summary }}</h1>
                    <div class="meta">
                        <span v-for="t in file.tags" :key="t" class="chip">{{ t }}</span>
                    </div>
                </div>
            </div>
            <!-- Landscape shot: full width on top -->
            <template v-else-if="file.coverImage">
                <img class="cover-top" :src="file.coverImage" :alt="file.title" />
                <div class="case-hero-body">
                    <p class="eyebrow">{{ file.title }}</p>
                    <h1 class="wide">{{ file.summary }}</h1>
                    <div class="meta">
                        <span v-for="t in file.tags" :key="t" class="chip">{{ t }}</span>
                    </div>
                </div>
            </template>
            <div v-else class="cover" :style="{ background: file.cover }">
                <span>{{ file.title }}</span>
            </div>
            <div class="case-grid">
                <div class="case-main">
                    <h2>What I did</h2>
                    <ul class="list"><li v-for="d in file.did" :key="d">{{ d }}</li></ul>
                    <div class="cta"><button class="btn" @click="emit('go', 'contact')">Talk about this project</button></div>
                </div>
                <dl class="case-side">
                    <div class="side-block">
                        <dt>Role</dt>
                        <dd>{{ file.role }}</dd>
                    </div>
                    <div v-for="s in file.stats" :key="s[1]" class="side-block">
                        <dt>{{ s[1] }}</dt>
                        <dd class="big">{{ s[0] }}</dd>
                    </div>
                </dl>
            </div>
        </template>

        <!-- About -->
        <template v-else-if="file.kind === 'about'">
            <div class="about-head">
                <img v-if="file.photo" class="about-photo" :src="file.photo" :alt="file.title" />
                <div>
                    <p class="eyebrow">about.md</p>
                    <h1>About me</h1>
                    <p v-if="file.tagline" class="tagline">{{ file.tagline }}</p>
                    <p class="lead">{{ file.intro }}</p>
                    <p v-for="(b, i) in file.bio || []" :key="i" class="mute">{{ b }}</p>
                    <p v-if="file.philosophy" class="philosophy">{{ file.philosophy }}</p>
                </div>
            </div>

            <template v-if="file.tech && file.tech.length">
                <h2>Technical background</h2>
                <dl class="tech-table">
                    <div v-for="row in file.tech" :key="row[0]" class="tech-row">
                        <dt>{{ row[0] }}</dt>
                        <dd>{{ row[1] }}</dd>
                    </div>
                </dl>
            </template>

            <template v-if="file.workflow && file.workflow.length">
                <h2>How I work</h2>
                <p class="mute">From an idea to a working solution — curiosity, structure, and a focus on solving actual problems.</p>
                <ol class="workflow">
                    <li v-for="w in file.workflow" :key="w[0]">
                        <b>{{ w[0] }}</b>
                        <p>{{ w[1] }}</p>
                    </li>
                </ol>
            </template>

            <template v-if="file.qualities && file.qualities.length">
                <h2>What defines me</h2>
                <ul class="qualities">
                    <li v-for="q in file.qualities" :key="q[0]">
                        <b>{{ q[0] }}</b>
                        <p>{{ q[1] }}</p>
                    </li>
                </ul>
            </template>

            <template v-if="file.tools && file.tools.length">
                <h2>Tools</h2>
                <div class="meta"><span v-for="t in file.tools" :key="t" class="chip mono">{{ t }}</span></div>
            </template>
        </template>

        <!-- Resume -->
        <template v-else-if="file.kind === 'resume'">
            <p class="eyebrow">resume.pdf</p>
            <h1>Experience &amp; skills</h1>
            <p class="mute">{{ file.subtitle }}</p>
            <div class="resume-grid">
                <div class="resume-main">
                    <h2>Experience</h2>
                    <div v-for="(e, i) in file.experience" :key="i" class="job">
                        <span class="when">{{ e[1] }}</span>
                        <h3>{{ e[0] }}</h3>
                        <span class="where">{{ e[2] }}</span>
                        <ul v-if="e[3]" class="job-points">
                            <li v-for="p in e[3]" :key="p">{{ p }}</li>
                        </ul>
                    </div>
                    <h2>Education</h2>
                    <p class="edu">{{ file.education }}</p>
                </div>
                <div class="side-rail">
                    <div class="rail-block">
                        <h2>Download</h2>
                        <div class="cta" style="margin-top:0">
                            <a class="btn" :href="file.pdf" download>Download PDF</a>
                        </div>
                    </div>
                    <div class="rail-block" v-if="file.skills && file.skills.length">
                        <h2>Technical skills</h2>
                        <ul class="skill-list">
                            <li v-for="s in file.skills" :key="s" class="chip">{{ s }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <template v-if="file.trainings && file.trainings.length">
                <h2>Trainings &amp; seminars</h2>
                <ul class="list plain">
                    <li v-for="t in file.trainings" :key="t" class="mute">{{ t }}</li>
                </ul>
            </template>
        </template>

        <!-- Contact -->
        <template v-else>
            <div class="contact-grid">
                <div>
                    <p class="eyebrow">contact.md</p>
                    <h1>Let's talk.</h1>
                    <p class="lead">{{ file.intro }}</p>
                    <a class="email-hero" :href="'mailto:' + file.email">{{ file.email }}</a>
                    <div class="cta">
                        <a class="btn" :href="'mailto:' + file.email">Send an email</a>
                        <a v-if="file.phone" class="btn ghost" :href="'tel:' + file.phone.replace(/[^0-9+]/g, '')">{{ file.phone }}</a>
                    </div>
                </div>
                <div class="contact-side">
                    <div v-if="file.location" class="side-block">
                        <span class="lab">Location</span>
                        <span class="val2">{{ file.location }}</span>
                    </div>
                    <div v-if="file.reply" class="side-block">
                        <span class="lab">Reply time</span>
                        <span class="val2">{{ file.reply }}</span>
                    </div>
                    <div class="side-block" v-if="file.phone">
                        <span class="lab">Phone</span>
                        <span class="val2">{{ file.phone }}</span>
                    </div>
                    <div class="link-rows">
                        <a v-for="l in file.links" :key="l[0]" class="link-row" :href="l[1]" :target="l[1].startsWith('mailto:') ? undefined : '_blank'" rel="noopener">
                            <span>{{ l[0] }}</span>
                            <span class="val">{{ l[1].replace(/^mailto:/, '').replace(/^https?:\/\/(www\.)?/, '') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
