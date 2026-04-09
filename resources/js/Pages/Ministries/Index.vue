<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { ArrowRightIcon } from '@heroicons/vue/24/outline';
import { ministries } from '@/siteImages';
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const cards = [
    {
        id: 'kids',
        title: 'Kids Ministry',
        meta: 'Infant through 5th grade / Meets Sundays at 9:30 am',
        body: 'A safe, joyful environment where children learn the good news of Jesus through age-appropriate teaching, caring volunteers, and fun that points to Christ.',
        href: route('ministries.kids'),
        image: ministries.kids,
        alt: 'Children smiling during kids ministry',
    },
    {
        id: 'youth',
        title: 'Youth Ministry',
        meta: '6th–12th grade / Sundays 6:30 pm – 8:00 pm',
        body: 'Students build real friendships and grow in faith alongside peers and caring leaders through worship, teaching, and honest conversation.',
        href: route('ministries.youth'),
        image: ministries.youth,
        alt: 'Students together at youth ministry',
    },
    {
        id: 'adults',
        title: 'Adult Groups',
        meta: 'Groups meet at various times and locations throughout the week.',
        body: 'Connect in smaller gatherings for prayer, Scripture, and life-on-life encouragement—because we grow best in relationship.',
        href: route('ministries.adults'),
        image: ministries.adults,
        alt: 'Adults in community at a small group',
    },
];
</script>

<template>
    <PublicLayout>
        <Head title="Ministries" />

        <div>
            <HeroSection
                :image-src="ministries.hero"
                eyebrow="Ministries at New Life Bible Church"
                title="A Place to Grow at Every Stage of Life"
                subtitle="At New Life Bible Church, our ministries are designed to help people of all ages experience life in Jesus and live new."
            />

            <section class="bg-white py-16">
                <SectionContainer>
                    <div class="mx-auto max-w-3xl text-center">
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">
                            Find Your Place
                        </h2>
                        <p class="mt-5 text-lg leading-relaxed text-slate-700 md:text-xl">
                            We believe spiritual growth happens best in relationships. Whether you are a child, a student,
                            or an adult, there is a place for you to connect, grow, and serve.
                        </p>
                    </div>

                    <div class="mt-12 grid gap-8 md:grid-cols-3 md:items-stretch">
                        <article
                            v-for="card in cards"
                            :id="card.id"
                            :key="card.id"
                            class="group flex min-h-0 flex-col overflow-hidden rounded-sm border border-neutral-tan/50 bg-white shadow-sm"
                        >
                            <div class="relative h-64 w-full shrink-0 overflow-hidden md:h-72">
                                <img
                                    :src="card.image"
                                    :alt="card.alt"
                                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-500 group-hover:scale-105"
                                />
                            </div>
                            <div class="flex flex-1 flex-col bg-primary p-6 text-white">
                                <h3 class="text-lg font-bold uppercase tracking-wide">
                                    {{ card.title }}
                                </h3>
                                <p class="mt-2 text-xs font-medium uppercase tracking-wider text-white/80">
                                    {{ card.meta }}
                                </p>
                                <p class="mt-3 text-sm leading-relaxed text-white/90">
                                    {{ card.body }}
                                </p>
                                <Link
                                    :href="card.href"
                                    class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-neutral-tan underline"
                                >
                                    Learn More
                                    <ArrowRightIcon class="h-4 w-4" />
                                </Link>
                            </div>
                        </article>
                    </div>
                </SectionContainer>
            </section>

            <section class="border-y border-neutral-tan/40 bg-surface-light py-20">
                <SectionContainer wrapper-class="text-center">
                    <h2 class="text-3xl font-bold text-primary md:text-4xl">
                        Interested in Serving
                    </h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-slate-700">
                        We believe everyone has gifts to contribute. Serving is one way to grow, build relationships, and be
                        part of what God is doing in our church and community.
                    </p>
                    <div class="mt-10">
                        <PrimaryButton :href="`${route('connect')}#contact`">Contact Us</PrimaryButton>
                    </div>
                </SectionContainer>
            </section>
        </div>
    </PublicLayout>
</template>
