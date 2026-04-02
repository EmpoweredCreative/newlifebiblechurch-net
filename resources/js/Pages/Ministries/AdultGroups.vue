<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { adultGroups } from '@/siteImages';
import { ArrowRightIcon } from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';

const churchCenterGroupsUrl = 'https://newlifebible.churchcenter.com/groups';

const cards = [
    'Meaningful relationships',
    'Clear and practical biblical teaching',
    'Encouragement during life\'s challenges',
    'A deeper sense of belonging',
];
</script>

<template>
    <PublicLayout>
        <Head title="Adult Groups" />

        <HeroSection
            :image-src="adultGroups.hero"
            eyebrow="Join a Group"
            title="Life Is Better Together"
            subtitle="Groups are one of the best ways to build meaningful relationships and grow in your faith."
        />

        <section class="bg-white py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">Groups at New Life</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            We believe spiritual growth happens best in relationships. Adult Groups are designed to create
                            space for connection, encouragement, prayer, and studying Scripture together.
                        </p>
                        <p class="mt-4 leading-relaxed text-slate-700">
                            Groups meet throughout the week in homes and other locations, providing a smaller setting where
                            real friendships can grow.
                        </p>
                    </div>
                    <div class="overflow-hidden rounded-sm shadow-lg">
                        <img :src="adultGroups.intro" alt="Adults in community" class="h-full w-full object-cover" />
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-light py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="order-2 overflow-hidden rounded-sm shadow-lg lg:order-1">
                        <img
                            :src="adultGroups.whatToExpect"
                            alt="Group discussion"
                            class="h-full w-full object-cover"
                        />
                    </div>
                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">What to Expect</h2>
                        <p class="mt-6 font-semibold text-primary">Each group provides:</p>
                        <ul class="mt-3 list-inside list-disc space-y-2 text-slate-700">
                            <li>A welcoming and relaxed environment</li>
                            <li>Biblical discussion and learning</li>
                            <li>Prayer and mutual encouragement</li>
                            <li>Opportunities to build genuine friendships</li>
                        </ul>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            You don’t need to have everything figured out to join. Come as you are and grow at your own
                            pace.
                        </p>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            To see current groups and meeting details, visit our Church Center page.
                        </p>
                        <div class="mt-4">
                            <PrimaryButton :href="churchCenterGroupsUrl">
                                <span class="inline-flex items-center gap-1.5">
                                    View Groups on Church Center
                                    <ArrowRightIcon class="h-4 w-4 shrink-0" aria-hidden="true" />
                                </span>
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary md:text-4xl">What You’ll Experience</h2>
                <p class="mx-auto mt-4 max-w-2xl text-center text-lg text-slate-700">
                    As part of an Adult Group, you can expect:
                </p>
                <div
                    class="mx-auto mt-12 grid w-full max-w-[516px] grid-cols-2 gap-3 sm:max-w-[524px] sm:gap-4"
                >
                    <div
                        v-for="(text, i) in cards"
                        :key="text"
                        class="flex aspect-square w-full min-h-0 flex-col items-center justify-center gap-4 bg-primary p-5 text-center sm:p-6"
                    >
                        <img
                            :src="adultGroups.experience[i]"
                            alt=""
                            class="h-28 w-28 shrink-0 object-contain brightness-0 invert sm:h-32 sm:w-32"
                        />
                        <h3
                            class="max-w-[11.5rem] text-sm font-bold leading-tight text-white sm:max-w-[13rem] sm:text-base"
                        >
                            {{ text }}
                        </h3>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="relative py-24">
            <img :src="adultGroups.cta" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/75" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">Take a Next Step</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    Whether you are new to church or looking to grow deeper in community, we would love to help you find a
                    group that fits your season of life.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="churchCenterGroupsUrl">
                        <span class="inline-flex items-center gap-1.5">
                            View Groups on Church Center
                            <ArrowRightIcon class="h-4 w-4 shrink-0" aria-hidden="true" />
                        </span>
                    </PrimaryButton>
                </div>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
