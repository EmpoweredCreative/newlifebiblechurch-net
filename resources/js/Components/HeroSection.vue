<script setup>
defineProps({
    imageSrc: { type: String, required: true },
    eyebrow: { type: String, default: '' },
    title: { type: String, required: true },
    subtitle: { type: String, default: '' },
    align: { type: String, default: 'center' },
});
</script>

<template>
    <section class="relative isolate min-h-[70vh] overflow-hidden md:min-h-[78vh]">
        <img :src="imageSrc" alt="" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-primary/75 nl-grain" />
        <div
            class="relative z-10 flex min-h-[70vh] flex-col justify-center px-4 py-24 md:min-h-[78vh] md:px-8"
            :class="align === 'center' ? 'items-center text-center' : 'items-start text-left'"
        >
            <p
                v-if="eyebrow"
                class="animate-fade-up mb-4 max-w-3xl text-xs font-semibold uppercase tracking-[0.2em] text-white/90 md:text-sm"
            >
                {{ eyebrow }}
            </p>
            <h1
                class="animate-fade-up stagger-1 max-w-4xl whitespace-pre-line text-4xl font-bold leading-tight text-white md:text-5xl lg:text-6xl"
            >
                {{ title }}
            </h1>
            <p
                v-if="subtitle"
                class="animate-fade-up stagger-2 mt-6 max-w-2xl text-lg text-white/90 md:text-xl"
            >
                {{ subtitle }}
            </p>
            <div v-if="$slots.default" class="animate-fade-up stagger-3 mt-10 flex flex-wrap items-center justify-center gap-4">
                <slot />
            </div>
        </div>
    </section>
</template>
