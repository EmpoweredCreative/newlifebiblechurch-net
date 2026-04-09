<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: { type: String, required: true },
});

const btnClass =
    'inline-flex items-center justify-center border border-white bg-transparent px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white transition hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary';

// Inertia Link always intercepts clicks and uses XHR; that breaks real off-site URLs (e.g. YouTube).
const isExternalUrl = computed(() => /^https?:\/\//i.test(props.href));
</script>

<template>
    <a
        v-if="isExternalUrl"
        :href="href"
        :class="btnClass"
        rel="noopener noreferrer"
        target="_blank"
    >
        <slot />
    </a>
    <Link v-else :href="href" :class="btnClass">
        <slot />
    </Link>
</template>
