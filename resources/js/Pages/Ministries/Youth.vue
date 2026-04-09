<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { youthMinistry } from '@/siteImages';
import { Head } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const connectFormUrl = `${route('connect')}#contact`;

const cards = [
    'Community and belonging',
    'Clear biblical teaching',
    'Encouragement in everyday life',
    'Leadership development opportunities',
];
</script>

<template>
    <PublicLayout>
        <Head title="Youth Ministry" />

        <HeroSection
            :image-src="youthMinistry.hero"
            eyebrow="Youth Ministry"
            title="A Place for Students to Grow in Faith and Friendship"
            lead="Middle and High School Students"
            subtitle="Our Youth Ministry helps students build real relationships, explore their faith, and grow in their understanding of who Jesus is."
        />

        <section class="bg-white py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">New Life Youth</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            A place for 6th–12th grade students.
                        </p>
                        <ul class="mt-6 space-y-2 text-slate-700">
                            <li>Sundays from 6:30–8:00 PM</li>
                            <li>Central York Middle School</li>
                        </ul>
                    </div>
                    <div class="overflow-hidden rounded-sm shadow-lg">
                        <img :src="youthMinistry.intro" alt="Youth gathering" class="h-full w-full object-cover" />
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-light py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="order-2 overflow-hidden rounded-sm shadow-lg lg:order-1">
                        <img :src="youthMinistry.whatToExpect" alt="Youth discussion" class="h-full w-full object-cover" />
                    </div>
                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">What to Expect</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">Our gatherings focus on:</p>
                        <ul class="mt-3 list-inside list-disc space-y-2 text-slate-700">
                            <li>Relevant biblical teaching</li>
                            <li>Honest conversations</li>
                            <li>Small group discussion</li>
                            <li>Building strong friendships</li>
                        </ul>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            We create a space where students can ask real questions and grow in confidence in their
                            faith.
                        </p>
                        <p class="mt-6 text-slate-700">Have questions about Youth Ministry?</p>
                        <div class="mt-4">
                            <PrimaryButton :href="connectFormUrl">Contact Us</PrimaryButton>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary md:text-4xl">What Students Experience</h2>
                <div
                    class="mx-auto mt-12 grid w-full max-w-[516px] grid-cols-2 gap-3 sm:max-w-[524px] sm:gap-4"
                >
                    <div
                        v-for="(text, i) in cards"
                        :key="text"
                        class="flex aspect-square w-full min-h-0 flex-col items-center justify-center gap-4 bg-primary p-5 text-center sm:p-6"
                    >
                        <img
                            :src="youthMinistry.experience[i]"
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
            <img :src="youthMinistry.cta" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/75" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">A Place for Students to Belong</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    Our Youth Ministry is committed to helping students build strong friendships, explore their faith,
                    and grow in confidence in who they are in Christ.
                </p>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
