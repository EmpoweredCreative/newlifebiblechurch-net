<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: { type: String, default: null },
    type: { type: String, default: 'submit' },
    disabled: { type: Boolean, default: false },
});
</script>

<template>
    <Link
        v-if="href"
        :href="href"
        class="inline-flex items-center justify-center rounded-sm bg-accent px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-accent/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
    >
        <slot />
    </Link>
    <button
        v-else
        :type="type"
        :disabled="disabled"
        class="inline-flex items-center justify-center rounded-sm bg-accent px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-accent/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:opacity-25"
    >
        <slot />
    </button>
</template>
