<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { startHere } from '@/siteImages';
import { Head, Link } from '@inertiajs/vue3';
import { MinusSmallIcon, PlusSmallIcon } from '@heroicons/vue/24/outline';
import { route } from 'ziggy-js';

const faqs = [
    {
        q: 'Do I need to dress a certain way?',
        a: 'Come as you are. You will see everything from casual to Sunday best—what matters is that you are here.',
    },
    {
        q: 'What if I don\'t know my Bible?',
        a: 'You are not alone. Our teaching is clear and accessible, and we welcome questions as we grow together.',
    },
    {
        q: 'Can I come alone?',
        a: 'Absolutely. Many people visit by themselves, and our team and community are glad to greet you.',
    },
    {
        q: 'What if I\'m unsure what I believe?',
        a: 'That is a safe place to start. We want you to explore truth at your own pace alongside caring people.',
    },
];
</script>

<template>
    <PublicLayout>
        <Head title="Start Here" />

        <HeroSection
            :image-src="startHere.hero"
            eyebrow="Visit New Life Bible Church"
            title="New Here? Start Here."
            subtitle="Whether you're visiting church for the first time, coming back after a break, or just exploring, you're welcome at New Life Bible Church."
        >
            <a
                href="https://newlifebible.churchcenter.com/people/forms/1193521"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center border border-transparent bg-neutral-tan px-6 py-3 text-xs font-semibold uppercase tracking-wider text-primary shadow-sm transition hover:bg-[#c9b5a4] focus:outline-none focus:ring-2 focus:ring-neutral-tan focus:ring-offset-2 focus:ring-offset-primary"
            >
                Get Connected
            </a>
            <Link
                href="#join-sunday"
                class="inline-flex items-center justify-center border-2 border-white bg-transparent px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white transition hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary"
            >
                Plan Your Visit
            </Link>
        </HeroSection>

        <section id="join-sunday" class="scroll-mt-28 bg-white">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">Join Us This Sunday</h2>
                        <p class="mt-2 text-lg font-semibold text-primary">Sunday Service</p>
                        <p class="mt-4 text-slate-700">Sundays 9:30am—10:45am</p>
                        <p class="text-slate-700">1950 N Hills Rd, York, PA 17406</p>
                        <p class="mt-4 text-slate-700">
                            <a href="tel:+17172528000" class="text-accent hover:underline">(717) 252-8000</a>
                        </p>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            Our gatherings are warm and welcoming. You will hear the Bible taught clearly, take part in
                            heartfelt worship, and meet people who are learning to follow Jesus in everyday life.
                        </p>
                        <p class="mt-4 leading-relaxed text-slate-700">
                            Whether you are new to church or have been walking with God for years, you can come as you are.
                        </p>
                    </div>
                    <div class="overflow-hidden rounded-sm shadow-lg ring-1 ring-neutral-tan/20">
                        <img :src="startHere.joinSunday" alt="Church building" class="aspect-[4/3] h-full w-full object-cover" />
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section id="what-to-expect" class="scroll-mt-28 bg-surface-light">
            <SectionContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div class="order-2 overflow-hidden rounded-sm shadow-lg ring-1 ring-neutral-tan/20 lg:order-1">
                        <img
                            :src="startHere.whatToExpect"
                            alt="People greeting at church"
                            class="aspect-[3/4] min-h-[320px] w-full object-cover lg:aspect-auto lg:min-h-[420px]"
                        />
                    </div>
                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl font-bold text-primary md:text-4xl">What to Expect</h2>
                        <p class="mt-6 leading-relaxed text-slate-700">
                            Services are about one hour and fifteen minutes. We sing together, pray, and open Scripture.
                            There is no pressure to participate beyond what you are comfortable with. Come as you are—whether
                            you prefer jeans or Sunday best.
                        </p>
                        <ul class="mt-6 space-y-3 text-slate-700">
                            <li class="flex gap-3">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-accent" />
                                <span>A welcoming environment</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-accent" />
                                <span>Authentic people</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-accent" />
                                <span>Clear teaching from Scripture</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-accent" />
                                <span>Great music &amp; worship services</span>
                            </li>
                        </ul>
                        <p class="mt-6 text-slate-700">If you have more questions, we would be glad to give you a tour.</p>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-16 md:py-20">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary md:text-4xl">Ministries</h2>
                <div class="mt-12 grid gap-8 md:grid-cols-3 md:gap-6">
                    <div class="flex flex-col overflow-hidden rounded-sm border border-neutral-tan/40 bg-white shadow-md">
                        <img :src="startHere.ministryKids" alt="" class="aspect-[4/3] w-full object-cover" />
                        <div class="flex flex-1 flex-col bg-primary px-5 py-6 text-white">
                            <h3 class="text-lg font-bold uppercase tracking-wide">Kids Ministry</h3>
                            <p class="mt-2 text-xs font-medium uppercase tracking-wide text-white/75">
                                Birth–5th grade | Sundays at 9:30 am
                            </p>
                            <p class="mt-4 flex-1 text-sm leading-relaxed text-white/90">
                                A safe, joyful environment where children learn the good news of Jesus.
                            </p>
                            <Link
                                :href="route('ministries.kids')"
                                class="mt-6 inline-flex text-sm font-semibold text-neutral-tan underline decoration-neutral-tan/80 underline-offset-4 transition hover:text-white"
                            >
                                Learn More
                            </Link>
                        </div>
                    </div>
                    <div class="flex flex-col overflow-hidden rounded-sm border border-neutral-tan/40 bg-white shadow-md">
                        <img :src="startHere.ministryYouth" alt="" class="aspect-[4/3] w-full object-cover" />
                        <div class="flex flex-1 flex-col bg-primary px-5 py-6 text-white">
                            <h3 class="text-lg font-bold uppercase tracking-wide">Youth Ministry</h3>
                            <p class="mt-2 text-xs font-medium uppercase tracking-wide text-white/75">
                                6th–12th grade | Weekly gatherings
                            </p>
                            <p class="mt-4 flex-1 text-sm leading-relaxed text-white/90">
                                Build friendships and faith alongside peers and caring leaders.
                            </p>
                            <Link
                                :href="route('ministries.youth')"
                                class="mt-6 inline-flex text-sm font-semibold text-neutral-tan underline decoration-neutral-tan/80 underline-offset-4 transition hover:text-white"
                            >
                                Learn More
                            </Link>
                        </div>
                    </div>
                    <div class="flex flex-col overflow-hidden rounded-sm border border-neutral-tan/40 bg-white shadow-md">
                        <img :src="startHere.ministryAdult" alt="" class="aspect-[4/3] w-full object-cover" />
                        <div class="flex flex-1 flex-col bg-primary px-5 py-6 text-white">
                            <h3 class="text-lg font-bold uppercase tracking-wide">Adult Groups</h3>
                            <p class="mt-2 text-xs font-medium uppercase tracking-wide text-white/75">
                                Groups meet at various times during the week
                            </p>
                            <p class="mt-4 flex-1 text-sm leading-relaxed text-white/90">
                                Meaningful relationships and discussion around God&apos;s Word.
                            </p>
                            <Link
                                :href="route('ministries.adults')"
                                class="mt-6 inline-flex text-sm font-semibold text-neutral-tan underline decoration-neutral-tan/80 underline-offset-4 transition hover:text-white"
                            >
                                Learn More
                            </Link>
                        </div>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-white py-12 md:py-16">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold text-primary md:text-4xl">Questions You Might Be Asking</h2>
                <div class="mx-auto mt-10 max-w-3xl space-y-3">
                    <Disclosure v-for="(faq, i) in faqs" :key="i" v-slot="{ open }" as="div" :default-open="i === 0">
                        <DisclosureButton
                            class="flex w-full items-center justify-between gap-4 border border-neutral-tan/60 px-4 py-4 text-left text-sm font-semibold text-primary transition"
                            :class="open ? 'bg-neutral-tan' : 'bg-white hover:bg-surface-cream'"
                        >
                            <span>{{ faq.q }}</span>
                            <component :is="open ? MinusSmallIcon : PlusSmallIcon" class="h-5 w-5 shrink-0 text-accent" />
                        </DisclosureButton>
                        <DisclosurePanel class="border border-t-0 border-neutral-tan/60 bg-surface-cream px-4 py-4 text-sm leading-relaxed text-slate-700">
                            {{ faq.a }}
                        </DisclosurePanel>
                    </Disclosure>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-primary py-16 text-white md:py-20">
            <SectionContainer wrapper-class="text-center">
                <h2 class="text-3xl font-bold md:text-4xl">Your Next Steps</h2>
                <div class="mt-10 grid gap-6 text-left md:grid-cols-3 md:gap-6">
                    <div class="flex flex-col overflow-hidden rounded-sm border border-white/10 bg-white shadow-lg">
                        <div class="bg-neutral-tan px-4 py-3 text-sm font-bold text-primary">Join us for a Sunday Service.</div>
                        <p class="flex-1 px-4 py-4 text-sm leading-relaxed text-slate-700">
                            Come see what we&apos;re about by worshiping with us in person.
                        </p>
                    </div>
                    <div class="flex flex-col overflow-hidden rounded-sm border border-white/10 bg-white shadow-lg">
                        <div class="bg-neutral-tan px-4 py-3 text-sm font-bold text-primary">Stop by our Welcome Desk.</div>
                        <p class="flex-1 px-4 py-4 text-sm leading-relaxed text-slate-700">
                            We would love to meet you, answer questions, and help you get oriented.
                        </p>
                    </div>
                    <div class="flex flex-col overflow-hidden rounded-sm border border-white/10 bg-white shadow-lg">
                        <div class="bg-neutral-tan px-4 py-3 text-sm font-bold text-primary">Find your place in Our Community.</div>
                        <p class="flex-1 px-4 py-4 text-sm leading-relaxed text-slate-700">
                            Explore groups and serving opportunities so you can grow with others.
                        </p>
                    </div>
                </div>
                <p class="mx-auto mt-10 max-w-2xl text-center text-base leading-relaxed text-white/90">
                    There is no pressure to have it all figured out. We would love to walk alongside you as you explore faith
                    and find your place.
                </p>
                <div class="mt-10">
                    <Link
                        :href="route('connect') + '#contact'"
                        class="inline-flex items-center justify-center border border-transparent bg-neutral-tan px-8 py-3 text-xs font-semibold uppercase tracking-wider text-primary shadow-sm transition hover:bg-[#c9b5a4] focus:outline-none focus:ring-2 focus:ring-neutral-tan focus:ring-offset-2 focus:ring-offset-primary"
                    >
                        Contact Us
                    </Link>
                </div>
            </SectionContainer>
        </section>

        <section class="relative min-h-[380px] py-24 md:min-h-[420px] md:py-28">
            <img :src="startHere.walkAlone" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/78" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">You Don&apos;t Have to Walk Alone</h2>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-white/90">
                    Jesus invites us into a family of faith. We would love to walk with you through celebration, struggle,
                    and growth.
                </p>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
