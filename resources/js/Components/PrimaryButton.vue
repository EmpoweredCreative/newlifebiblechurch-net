<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: { type: String, default: null },
    type: { type: String, default: 'submit' },
    disabled: { type: Boolean, default: false },
});

const btnClass =
    'inline-flex items-center justify-center rounded-sm bg-accent px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-accent/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2';

// Inertia Link intercepts navigation; external URLs need a real anchor (same pattern as OutlineButton).
const isExternalHref = computed(() => {
    const h = props.href;
    if (!h) {
        return false;
    }
    return /^https?:\/\//i.test(h) || /^mailto:/i.test(h) || /^tel:/i.test(h);
});
</script>

<template>
    <a v-if="href && isExternalHref" :href="href" :class="btnClass">
        <slot />
    </a>
    <Link v-else-if="href" :href="href" :class="btnClass">
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
