<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { ministryTeam, whoWeAre } from '@/siteImages';
import { Head } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const values = ['Biblical Authority', 'Next Generation', 'Generosity', 'Celebration'];
</script>

<template>
    <PublicLayout>
        <Head title="Who We Are" />

        <HeroSection
            :image-src="whoWeAre.hero"
            eyebrow="About New Life Bible Church"
            title="A Welcoming Church Built on Grace and Truth"
            subtitle="New Life Bible Church is a community centered on biblical truth, genuine relationships, and a shared desire to help all people experience life in Jesus and live new"
        />

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
                                To help all people experience life in Jesus and live new
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
                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div
                        v-for="title in values"
                        :key="title"
                        class="flex min-h-[148px] items-center justify-center rounded-sm border-2 border-primary bg-white p-6"
                    >
                        <p class="text-center font-semibold text-primary">{{ title }}</p>
                    </div>
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
