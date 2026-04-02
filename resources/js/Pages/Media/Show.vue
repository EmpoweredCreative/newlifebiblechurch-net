<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

defineProps({
    sermon: {
        type: Object,
        required: true,
    },
    embedUrl: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <PublicLayout>
        <Head :title="sermon.title" />

        <div class="border-b border-neutral-tan/60 bg-white py-10">
            <SectionContainer>
                <Link
                    :href="route('media')"
                    class="text-sm font-semibold uppercase tracking-wide text-primary transition hover:text-accent"
                >
                    ← Back to Media
                </Link>
                <p v-if="sermon.published_at" class="mt-4 text-sm font-medium uppercase tracking-wide text-slate-500">
                    {{ sermon.published_at }}
                </p>
                <h1 class="mt-2 text-3xl font-bold text-primary md:text-4xl">{{ sermon.title }}</h1>
                <p class="mt-6 max-w-3xl text-lg leading-relaxed text-slate-700">{{ sermon.description }}</p>
            </SectionContainer>
        </div>

        <section class="bg-surface-cream py-12">
            <SectionContainer>
                <div v-if="embedUrl" class="mx-auto max-w-4xl overflow-hidden rounded-sm shadow-lg">
                    <div class="relative aspect-video w-full bg-slate-900">
                        <iframe
                            :src="embedUrl"
                            class="absolute inset-0 h-full w-full"
                            title="Sermon video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        />
                    </div>
                </div>
                <p v-else class="text-center text-slate-600">
                    This sermon does not have a playable video link. Please contact the church if you need help.
                </p>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
