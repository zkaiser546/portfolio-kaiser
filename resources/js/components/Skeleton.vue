<template>
    <div class="win sk-win" role="status" aria-busy="true">
        <aside aria-hidden="true">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="brand"><b class="sk sk-circle" style="width:30px;height:30px;border-radius:8px"></b><span class="sk sk-line" style="width:88px;height:18px"></span></div>
            <div class="sk sk-block find-sk"></div>
            <ul class="tree">
                <li v-for="i in 6" :key="i" class="sk-tree-row">
                    <span class="sk sk-line" :style="{ width: 40 + ((i * 17) % 110) + 'px', height: '13px' }"></span>
                </li>
            </ul>
            <div class="me">
                <div class="sk sk-circle" style="width:40px;height:40px"></div>
                <div style="flex:1">
                    <span class="sk sk-line" style="width:70%;height:13px;margin-bottom:8px"></span>
                    <span class="sk sk-line" style="width:90%;height:11px"></span>
                </div>
            </div>
        </aside>

        <main aria-hidden="true">
            <div class="top">
                <span class="sk sk-line" style="width:220px;height:13px"></span>
            </div>
            <div class="tabs">
                <div class="tab sk-tab"><span class="sk sk-line" style="width:96px;height:13px"></span></div>
            </div>
            <section class="view">
                <div>
                    <span class="sk sk-line" style="width:150px;height:12px;margin-bottom:22px"></span>
                    <div class="sk-hero">
                        <div>
                            <span class="sk sk-line" style="width:92%;height:44px;margin-bottom:12px"></span>
                            <span class="sk sk-line" style="width:74%;height:44px;margin-bottom:24px"></span>
                            <span class="sk sk-line" style="width:88%;height:15px;margin-bottom:10px"></span>
                            <span class="sk sk-line" style="width:80%;height:15px;margin-bottom:24px"></span>
                            <div style="display:flex;gap:10px">
                                <span class="sk sk-pill"></span>
                                <span class="sk sk-pill" style="width:110px"></span>
                            </div>
                        </div>
                        <div class="sk-meta">
                            <span class="sk sk-line" style="width:60%;height:11px"></span>
                            <span class="sk sk-line" style="width:85%;height:14px;margin-top:14px"></span>
                            <span class="sk sk-line" style="width:70%;height:11px;margin-top:18px"></span>
                            <span class="sk sk-line" style="width:90%;height:14px;margin-top:8px"></span>
                        </div>
                    </div>
                    <div class="sk-strip">
                        <div v-for="i in 3" :key="i" class="sk-strip-cell">
                            <span class="sk sk-line" style="width:56px;height:26px;margin-bottom:8px"></span>
                            <span class="sk sk-line" style="width:80%;height:13px"></span>
                        </div>
                    </div>
                    <span class="sk sk-line" style="width:130px;height:12px;margin:36px 0 16px"></span>
                    <div class="sk-projects">
                        <div v-for="i in 3" :key="i" class="sk-project">
                            <span class="sk sk-block" style="width:140px;height:88px;border-radius:8px"></span>
                            <div style="flex:1">
                                <span class="sk sk-line" style="width:40%;height:19px;margin-bottom:8px"></span>
                                <span class="sk sk-line" style="width:90%;height:14px;margin-bottom:6px"></span>
                                <span class="sk sk-line" style="width:70%;height:14px;margin-bottom:12px"></span>
                                <div style="display:flex;gap:8px">
                                    <span class="sk sk-chip"></span>
                                    <span class="sk sk-chip" style="width:58px"></span>
                                    <span class="sk sk-chip" style="width:72px"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="status">
                <i style="background:var(--line)"></i>
                <span class="sk sk-line" style="width:260px;height:11px"></span>
            </div>
        </main>
        <span class="visually-hidden">Loading portfolio…</span>
    </div>
</template>
