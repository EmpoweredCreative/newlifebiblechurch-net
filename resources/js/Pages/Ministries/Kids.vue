<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { kidsMinistry } from '@/siteImages';
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const cards = [
    'Clear Teaching from the Bible',
    'Loving Leaders who Care',
    'A Place to Build Friendships',
    'Encouragement to Grow in Faith',
];
</script>

<template>
    <PublicLayout>
        <Head title="Kids Ministry" />

        <HeroSection
            :image-src="kidsMinistry.hero"
            eyebrow="Kids Ministry"
            title="A Safe and Joyful Place to Grow"
            subtitle="Our Kids Ministry helps children experience life in Jesus in a safe, welcoming, and engaging environment."
        />

        <section class="bg-white py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">New Life Kids</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            We partner with families to help children build a strong foundation of faith. We serve infants
                            through 5th grade during our Sunday morning service.
                        </p>
                        <ul class="mt-6 space-y-2 text-slate-700">
                            <li>Sundays at 9:30am</li>
                            <li>1950 N Hills Rd, York, PA 17406</li>
                            <li>
                                <a href="tel:+17172528000" class="text-accent hover:underline">(717) 252-8000</a>
                            </li>
                        </ul>
                    </div>
                    <div class="overflow-hidden rounded-sm shadow-lg">
                        <img :src="kidsMinistry.intro" alt="Children" class="h-full w-full object-cover" />
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-light py-16">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="order-2 overflow-hidden rounded-sm shadow-lg lg:order-1">
                        <img :src="kidsMinistry.whatToExpect" alt="Teaching" class="h-full w-full object-cover" />
                    </div>
                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">What to Expect</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            When you arrive, our team will help you check in your child and answer questions. We want kids
                            to feel welcomed, known, and excited to learn.
                        </p>
                        <p class="mt-4 font-semibold text-primary">Each week includes:</p>
                        <ul class="mt-3 list-inside list-disc space-y-2 text-slate-700">
                            <li>Age-appropriate Bible teaching</li>
                            <li>Worship and interactive learning</li>
                            <li>A caring and secure environment</li>
                        </ul>
                        <p class="mt-6 text-slate-700">Have questions about kids ministry?</p>
                        <div class="mt-4">
                            <PrimaryButton :href="route('connect')">Contact Our Team</PrimaryButton>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary md:text-4xl">What Kids Experience</h2>
                <div
                    class="mx-auto mt-12 grid w-full max-w-[516px] grid-cols-2 gap-3 sm:max-w-[524px] sm:gap-4"
                >
                    <div
                        v-for="(text, i) in cards"
                        :key="text"
                        class="flex aspect-square w-full min-h-0 flex-col items-center justify-center gap-4 bg-primary p-5 text-center sm:p-6"
                    >
                        <img
                            :src="kidsMinistry.experience[i]"
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
            <img :src="kidsMinistry.cta" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/75" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">A Place for Your Child to Grow</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    We would love to welcome your family and help your child experience life in Jesus in a safe, joyful
                    environment.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
                </div>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
