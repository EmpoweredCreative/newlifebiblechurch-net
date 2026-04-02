<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: { type: String, required: true },
});
</script>

<template>
    <Link
        :href="href"
        class="inline-flex items-center justify-center border border-white bg-transparent px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white transition hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary"
    >
        <slot />
    </Link>
</template>
