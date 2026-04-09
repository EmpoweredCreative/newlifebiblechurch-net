<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import OutlineButton from '@/Components/OutlineButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { home } from '@/siteImages';
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
</script>

<template>
    <PublicLayout>
        <Head title="Home" />

        <HeroSection
            :image-src="home.hero"
            eyebrow="New Life Bible Church in York, PA"
            :title="'Experience life in Jesus.\nLive new.'"
            subtitle="Come as you are and be welcomed into a community where you can be fully known, fully loved, and experience real change through Jesus."
        >
            <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
            <OutlineButton href="https://www.youtube.com/@NewLifeBibleChurchPA">Watch Online</OutlineButton>
        </HeroSection>

        <section class="bg-white py-20">
            <SectionContainer wrapper-class="text-center">
                <h2 class="text-3xl font-bold text-accent md:text-4xl">A Place to Belong</h2>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-700">
                    We are a gospel-centered community learning to follow Jesus together—with honesty, hope, and room for
                    questions. Whether you are exploring faith or have walked with Christ for years, you are welcome here.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="route('start-here') + '#what-to-expect'">What to Expect</PrimaryButton>
                </div>
            </SectionContainer>
        </section>

        <section
            class="relative bg-primary py-20 text-white"
            :style="{ backgroundImage: `url(${home.joinSunday})` }"
        >
            <div class="absolute inset-0 bg-primary/85" />
            <SectionContainer wrapper-class="relative z-10 text-center">
                <h2 class="text-3xl font-bold md:text-4xl">Join Us This Sunday</h2>
                <div class="mt-12 grid gap-10 md:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-neutral-tan">Service Time</h3>
                        <p class="mt-3 text-lg">9:30 am – 10:45 am</p>
                        <p class="mt-2 text-sm text-white/85">1950 N Hills Rd, York, PA 17406</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-neutral-tan">Kids Ministry</h3>
                        <p class="mt-3 text-lg">Infant – 5th grade during the service</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-neutral-tan">Youth Ministry</h3>
                        <p class="mt-3 text-lg">6th – 12th grade — Sunday evenings</p>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-cream py-6">
            <SectionContainer wrapper-class="!py-10">
                <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                    <Link
                        :href="route('ministries.kids')"
                        class="group relative flex min-h-[220px] items-end overflow-hidden rounded-sm md:min-h-[280px]"
                    >
                        <img :src="home.kids" alt="" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-primary/35" />
                        <span class="relative m-4 bg-primary px-6 py-3 text-sm font-semibold uppercase tracking-wider text-white">
                            Kids
                        </span>
                    </Link>
                    <Link
                        :href="route('ministries.youth')"
                        class="group relative flex min-h-[220px] items-end overflow-hidden rounded-sm md:min-h-[280px]"
                    >
                        <img :src="home.youth" alt="" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-primary/35" />
                        <span class="relative m-4 bg-primary px-6 py-3 text-sm font-semibold uppercase tracking-wider text-white">
                            Youth
                        </span>
                    </Link>
                </div>
                <div class="mt-4 grid gap-4 md:grid-cols-3 md:gap-6">
                    <Link
                        :href="route('start-here') + '#what-to-expect'"
                        class="group relative flex min-h-[180px] items-end overflow-hidden rounded-sm"
                    >
                        <img :src="home.whatToExpect" alt="" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-primary/35" />
                        <span class="relative m-3 bg-primary px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white md:text-sm">
                            What to Expect
                        </span>
                    </Link>
                    <Link
                        :href="route('connect')"
                        class="group relative flex min-h-[180px] items-end overflow-hidden rounded-sm"
                    >
                        <img :src="home.getConnected" alt="" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-primary/35" />
                        <span class="relative m-3 bg-primary px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white md:text-sm">
                            Get Connected
                        </span>
                    </Link>
                    <Link
                        :href="route('who-we-are')"
                        class="group relative flex min-h-[180px] items-end overflow-hidden rounded-sm"
                    >
                        <img :src="home.meetTeam" alt="" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-primary/35" />
                        <span class="relative m-3 bg-primary px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white md:text-sm">
                            What We Believe
                        </span>
                    </Link>
                </div>
            </SectionContainer>
        </section>

        <section class="relative py-24">
            <img :src="home.footerCta" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/70 nl-grain" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">There's a Place for You Here</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    If you're searching for hope, clarity, and meaningful relationships, you're welcome here.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
                </div>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
