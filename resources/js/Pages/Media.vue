<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { media } from '@/siteImages';
import { PlayCircleIcon } from '@heroicons/vue/24/solid';
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { computed, ref } from 'vue';

const youtubeChannelUrl = 'https://www.youtube.com/@NewLifeBibleChurchPA';

const props = defineProps({
    featured: {
        type: Object,
        default: () => ({}),
    },
    sermons: {
        type: Array,
        default: () => [],
    },
});

const featuredPlaying = ref(false);

const playbackEmbedSrc = computed(() => {
    const url = props.featured?.embedUrl;
    if (!url) {
        return '';
    }
    try {
        const u = new URL(url);
        u.searchParams.set('autoplay', '1');
        if (u.hostname.includes('youtube.com')) {
            u.searchParams.set('rel', '0');
        }
        return u.toString();
    } catch {
        const sep = url.includes('?') ? '&' : '?';
        return `${url}${sep}autoplay=1`;
    }
});

function playFeaturedVideo() {
    featuredPlaying.value = true;
}
</script>

<template>
    <PublicLayout>
        <Head title="Media" />

        <HeroSection
            :image-src="media.hero"
            eyebrow="Messages at New Life Bible Church"
            title="Biblical Teaching for Everyday Life"
            subtitle="We teach Scripture with clarity and conviction—so you can know Jesus and follow Him in the rhythms of daily life."
        >
            <div>
                <PrimaryButton :href="route('media')">Watch Online</PrimaryButton>
            </div>
        </HeroSection>

        <section class="bg-white py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div v-if="featured.embedUrl" class="overflow-hidden rounded-sm shadow-md">
                        <div class="relative aspect-video w-full bg-slate-900">
                            <template v-if="!featuredPlaying">
                                <img
                                    v-if="featured.posterUrl"
                                    :src="featured.posterUrl"
                                    alt=""
                                    class="h-full w-full object-cover"
                                    loading="lazy"
                                />
                                <div v-else class="absolute inset-0 bg-slate-800" />
                                <button
                                    type="button"
                                    class="absolute inset-0 flex items-center justify-center bg-black/35 transition hover:bg-black/45 focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2"
                                    aria-label="Play latest message video"
                                    @click="playFeaturedVideo"
                                >
                                    <span
                                        class="flex rounded-full bg-white/95 p-3 text-accent shadow-lg ring-4 ring-white/40 transition hover:scale-105"
                                    >
                                        <PlayCircleIcon class="h-14 w-14 md:h-16 md:w-16" aria-hidden="true" />
                                    </span>
                                </button>
                            </template>
                            <iframe
                                v-else
                                :src="playbackEmbedSrc"
                                class="absolute inset-0 h-full w-full"
                                title="Latest message video"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen
                            />
                        </div>
                    </div>
                    <div v-else class="overflow-hidden rounded-sm shadow-md">
                        <img :src="media.featured" alt="" class="aspect-video w-full object-cover" />
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-primary md:text-3xl">{{ featured.title }}</h2>
                        <p class="mt-4 text-slate-600">{{ featured.description }}</p>
                        <div v-if="featured.slug" class="mt-8">
                            <PrimaryButton :href="route('media.show', featured.slug)">Watch Latest Message</PrimaryButton>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="border-y border-neutral-tan/40 bg-surface-light py-16">
            <SectionContainer>
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-2xl font-bold text-primary md:text-3xl">Messages on YouTube</h2>
                    <p class="mt-4 text-lg text-slate-700">
                        Full messages and teaching also appear on our YouTube channel when they are published—subscribe so you
                        never miss a week.
                    </p>
                    <div class="mt-8">
                        <a
                            :href="youtubeChannelUrl"
                            class="inline-flex items-center justify-center rounded-sm bg-accent px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-accent/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                            rel="noopener noreferrer"
                            target="_blank"
                        >
                            Open YouTube Channel
                        </a>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16">
            <SectionContainer>
                <div v-if="sermons.length" class="grid gap-8 md:grid-cols-3">
                    <Link
                        v-for="item in sermons"
                        :key="item.slug"
                        :href="route('media.show', item.slug)"
                        :aria-label="`Open message: ${item.title}`"
                        class="group block overflow-hidden border border-neutral-tan/50 bg-white shadow-sm transition hover:border-accent/40 hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2"
                    >
                        <article class="h-full">
                            <div class="relative aspect-video w-full overflow-hidden bg-slate-900">
                                <img
                                    v-if="item.posterUrl"
                                    :src="item.posterUrl"
                                    alt=""
                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                                    loading="lazy"
                                />
                                <div v-else class="absolute inset-0 bg-slate-800" />
                                <div
                                    class="pointer-events-none absolute inset-0 flex items-center justify-center bg-black/30 transition group-hover:bg-black/40"
                                    aria-hidden="true"
                                >
                                    <span
                                        class="flex rounded-full bg-white/95 p-2 text-accent shadow-md ring-2 ring-white/50 transition group-hover:scale-105"
                                    >
                                        <PlayCircleIcon class="h-10 w-10 md:h-12 md:w-12" />
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-primary group-hover:text-accent">{{ item.title }}</h3>
                                <p class="mt-2 text-sm text-slate-600">{{ item.description }}</p>
                            </div>
                        </article>
                    </Link>
                </div>
                <p v-else class="text-center text-slate-600">More messages will be listed here when they are published.</p>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
