<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import OutlineButton from '@/Components/OutlineButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { ministryTeam, whoWeAre } from '@/siteImages';
import { Head } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const values = [
    { title: 'Biblical Authority', description: "We structure our lives according to God's word." },
    { title: 'Next Generation', description: 'We help children and youth thrive in Christ.' },
    { title: 'Generosity', description: 'We give to expand the impact of Jesus.' },
    { title: 'Celebration', description: 'We celebrate the Holy Spirit at work.' },
];
</script>

<template>
    <PublicLayout>
        <Head title="Who We Are" />

        <HeroSection
            :image-src="whoWeAre.hero"
            eyebrow="About New Life Bible Church"
            title="A Welcoming Church Built on Grace and Truth"
            subtitle="New Life Bible Church is a community centered on biblical truth, genuine relationships, and a shared desire to walk together through every season of life."
        >
            <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
            <OutlineButton :href="route('connect')">Get in Touch</OutlineButton>
        </HeroSection>

        <section class="bg-white py-16">
            <SectionContainer wrapper-class="text-center">
                <h2 class="text-3xl font-bold text-primary md:text-4xl">Our Story</h2>
                <p class="mx-auto mt-8 max-w-3xl leading-relaxed text-slate-700">
                    We exist to glorify God by being a community of Jesus followers. Over the years, God has drawn together
                    people from many backgrounds who share a desire to know Christ and make Him known. We are not perfect—
                    but we are committed to grace, honesty, and the truth of Scripture as we grow.
                </p>
                <p class="mx-auto mt-6 max-w-3xl leading-relaxed text-slate-700">
                    Our hope is to be a gospel-centered community where you can ask hard questions, find real friendships,
                    and experience transformation by the Spirit of God.
                </p>
            </SectionContainer>
        </section>

        <section class="bg-surface-light py-16">
            <SectionContainer>
                <div class="grid gap-8 md:grid-cols-3 md:items-stretch">
                    <div class="flex min-h-0 flex-col overflow-hidden rounded-sm border border-neutral-tan/50 bg-white shadow-sm">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden">
                            <img
                                :src="whoWeAre.purpose"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover object-top"
                            />
                        </div>
                        <div class="flex flex-1 flex-col bg-primary p-6 text-white">
                            <h3 class="text-sm font-bold uppercase tracking-wider">Our Purpose</h3>
                            <p class="mt-3 text-sm leading-relaxed text-white/90">
                                We exist to glorify God by being a community of Jesus followers who seek to make Him known
                                and live with passion, truth, and love.
                            </p>
                        </div>
                    </div>
                    <div class="flex min-h-0 flex-col overflow-hidden rounded-sm border border-neutral-tan/50 bg-white shadow-sm">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden">
                            <img
                                :src="whoWeAre.mission"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover object-top"
                            />
                        </div>
                        <div class="flex flex-1 flex-col bg-primary p-6 text-white">
                            <h3 class="text-sm font-bold uppercase tracking-wider">Our Mission</h3>
                            <p class="mt-3 text-sm leading-relaxed text-white/90">
                                To help all people experience the life-changing power of Jesus in their lives.
                            </p>
                        </div>
                    </div>
                    <div class="flex min-h-0 flex-col overflow-hidden rounded-sm border border-neutral-tan/50 bg-white shadow-sm">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden">
                            <img
                                :src="whoWeAre.vision"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover object-top"
                            />
                        </div>
                        <div class="flex flex-1 flex-col bg-primary p-6 text-white">
                            <h3 class="text-sm font-bold uppercase tracking-wider">Our Vision</h3>
                            <p class="mt-3 text-sm leading-relaxed text-white/90">
                                To see people experience Jesus' love and find the life that is found in Him—now and
                                eternally.
                            </p>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary">Our Values</h2>
                <p class="mx-auto mt-4 max-w-2xl text-center text-slate-700">
                    These values shape what we prioritize and how we serve one another.
                </p>
                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div
                        v-for="item in values"
                        :key="item.title"
                        tabindex="0"
                        class="group relative flex min-h-[148px] cursor-default overflow-hidden rounded-sm border-2 border-primary bg-white outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2"
                    >
                        <div
                            class="flex w-full items-center justify-center p-6 transition-opacity duration-300 group-hover:opacity-0 group-hover:pointer-events-none group-focus-within:opacity-0"
                        >
                            <p class="text-center font-semibold text-primary">{{ item.title }}</p>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-primary p-6 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-focus-within:opacity-100"
                        >
                            <p class="text-center text-sm leading-relaxed">{{ item.description }}</p>
                        </div>
                    </div>
                </div>
                <p class="mx-auto mt-8 max-w-2xl text-center text-slate-700">
                    These principles guide how we gather, how we lead, and how we walk alongside one another.
                </p>
                <div class="mt-8 text-center">
                    <PrimaryButton :href="route('ministries.adults')">Join A Group</PrimaryButton>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-light py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary">Leadership</h2>
                <p class="mx-auto mt-4 max-w-2xl text-center text-slate-700">
                    Healthy churches are built on healthy leadership. Our elders and ministry team serve faithfully to
                    shepherd and equip the body.
                </p>
                <div class="mt-12">
                    <h3 class="text-center text-sm font-bold uppercase tracking-wider text-primary">Elders</h3>
                    <div class="mt-8 flex flex-wrap justify-center gap-10">
                        <div class="text-center">
                            <img
                                :src="whoWeAre.elderNate"
                                alt=""
                                class="mx-auto h-28 w-28 rounded-full object-cover ring-2 ring-neutral-tan/40"
                            />
                            <p class="mt-3 font-semibold text-primary">Nate King</p>
                            <p class="text-sm text-slate-600">Lead Pastor</p>
                        </div>
                        <div class="text-center">
                            <img
                                :src="whoWeAre.elderJeff"
                                alt=""
                                class="mx-auto h-28 w-28 rounded-full object-cover ring-2 ring-neutral-tan/40"
                            />
                            <p class="mt-3 font-semibold text-primary">Jeff Marble</p>
                            <p class="text-sm text-slate-600">Elder Chair</p>
                        </div>
                        <div class="text-center">
                            <img
                                :src="whoWeAre.elderJohn"
                                alt=""
                                class="mx-auto h-28 w-28 rounded-full object-cover ring-2 ring-neutral-tan/40"
                            />
                            <p class="mt-3 font-semibold text-primary">John Goasdone</p>
                            <p class="text-sm text-slate-600">Elder</p>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-center text-sm font-bold uppercase tracking-wider text-primary">Ministry Team</h3>
                    <div class="mt-8 grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-6">
                        <div v-for="member in ministryTeam" :key="member.name" class="text-center">
                            <img
                                :src="member.photo"
                                :alt="member.name"
                                class="mx-auto h-24 w-24 rounded-full object-cover ring-2 ring-neutral-tan/40"
                            />
                            <p class="mt-2 text-sm font-medium text-primary">{{ member.name }}</p>
                            <p class="text-xs text-slate-600">{{ member.title }}</p>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="relative overflow-hidden py-24">
            <img
                :src="whoWeAre.welcome"
                alt=""
                class="absolute left-0 right-0 top-[-150px] h-[calc(100%+150px)] w-full object-cover"
            />
            <div class="absolute inset-0 bg-primary/70" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">You Are Welcome Here</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    We'd love to meet you this Sunday. Come as you are—and let's take a next step together.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
                </div>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
