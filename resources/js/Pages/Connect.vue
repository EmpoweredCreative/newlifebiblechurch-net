<script setup>
import HeroSection from '@/Components/HeroSection.vue';
import OutlineButton from '@/Components/OutlineButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { connect } from '@/siteImages';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { computed, onMounted } from 'vue';

const page = usePage();
const successMessage = computed(() => page.props.success);
const errorMessage = computed(() => page.props.error);

const form = useForm({
    first_name: '',
    last_name: '',
    phone: '',
    email: '',
    message: '',
    company: '',
    form_started_at: 0,
});

onMounted(() => {
    form.form_started_at = Date.now();
});

function submit() {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            form.form_started_at = Date.now();
        },
    });
}
</script>

<template>
    <PublicLayout>
        <Head title="Connect" />

        <HeroSection
            :image-src="connect.hero"
            eyebrow="Connect with New Life Bible Church"
            title="Take a Next Step"
            subtitle="Whether you have questions, need prayer, or are looking for a place to belong, we would love to connect with you."
        >
            <PrimaryButton :href="route('start-here')">New Here? Start Here</PrimaryButton>
            <OutlineButton :href="route('who-we-are')">Learn More</OutlineButton>
        </HeroSection>

        <section class="bg-white py-16">
            <SectionContainer>
                <div class="grid gap-12 lg:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold text-primary">Visit Us</h2>
                        <p class="mt-2 text-lg font-semibold text-primary">Sunday Service</p>
                        <p class="mt-4 text-slate-700">Sundays 9:30am—10:45am</p>
                        <p class="text-slate-700">1950 N Hills Rd, York, PA 17406</p>
                        <p class="mt-4 text-slate-700">
                            <a href="tel:+17172528000" class="text-accent hover:underline">(717) 252-8000</a>
                        </p>
                        <p class="text-slate-700">
                            <a href="mailto:contact@newlifebiblechurch.net" class="text-accent hover:underline">
                                contact@newlifebiblechurch.net
                            </a>
                        </p>
                        <p class="mt-6 text-slate-700">We would love to welcome you this Sunday!</p>
                    </div>
                    <div class="min-h-[280px] overflow-hidden rounded-sm bg-surface-light">
                        <iframe
                            title="Church location"
                            class="h-full min-h-[280px] w-full border-0 grayscale-[20%]"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://maps.google.com/maps?q=1950+N+Hills+Rd,+York,+PA+17406&hl=en&z=14&output=embed"
                        />
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-primary py-16 text-white">
            <SectionContainer>
                <h2 class="text-center text-3xl font-bold">Ways to Get Connected</h2>
                <p class="mx-auto mt-4 max-w-2xl text-center text-white/85">
                    Community matters. We want to know you—and for you to know us—through honest conversation and care.
                </p>
                <div class="mt-12 grid gap-6 md:grid-cols-2">
                    <div class="border border-neutral-tan/80 bg-surface-light p-8 shadow-lg">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-primary">Talk with a Pastor</h3>
                        <p class="mt-3 text-sm text-slate-700">
                            Questions about faith, baptism, or next steps? We'd be honored to listen and help.
                        </p>
                    </div>
                    <div class="border border-neutral-tan/80 bg-surface-light p-8 shadow-lg">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-primary">Request Prayer</h3>
                        <p class="mt-3 text-sm text-slate-700">
                            Our team prays for the needs of our church family and community.
                        </p>
                    </div>
                    <div class="border border-neutral-tan/80 bg-surface-light p-8 shadow-lg">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-primary">Join a Group</h3>
                        <p class="mt-3 text-sm text-slate-700">
                            Grow in Scripture and friendship in a smaller group setting during the week.
                        </p>
                    </div>
                    <div class="border border-neutral-tan/80 bg-surface-light p-8 shadow-lg">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-primary">Ways to Serve</h3>
                        <p class="mt-3 text-sm text-slate-700">
                            Use your gifts to bless others—on Sundays and throughout the week.
                        </p>
                    </div>
                </div>
            </SectionContainer>
        </section>

        <section class="bg-surface-cream py-16">
            <SectionContainer>
                <p class="text-center text-slate-700">
                    Send us a note and someone from our team will follow up shortly.
                </p>
                <div
                    v-if="successMessage"
                    class="mx-auto mt-6 max-w-xl rounded-sm border border-accent/40 bg-white px-4 py-3 text-center text-sm text-primary"
                >
                    {{ successMessage }}
                </div>
                <div
                    v-if="errorMessage"
                    class="mx-auto mt-6 max-w-xl rounded-sm border border-red-200 bg-red-50 px-4 py-3 text-center text-sm text-red-800"
                    role="alert"
                >
                    {{ errorMessage }}
                </div>
                <form class="relative mx-auto mt-10 max-w-3xl space-y-6" @submit.prevent="submit">
                    <p
                        v-if="form.errors.form_started_at"
                        class="rounded-sm border border-red-200 bg-red-50 px-4 py-3 text-center text-sm text-red-800"
                        role="alert"
                    >
                        {{ form.errors.form_started_at }}
                    </p>
                    <div
                        class="absolute -left-[10000px] h-0 w-0 overflow-hidden"
                        aria-hidden="true"
                    >
                        <label for="contact_company">Company</label>
                        <input
                            id="contact_company"
                            v-model="form.company"
                            type="text"
                            name="company"
                            tabindex="-1"
                            autocomplete="off"
                        />
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block text-xs font-semibold uppercase tracking-wide text-primary">First Name</label>
                            <input
                                id="first_name"
                                v-model="form.first_name"
                                type="text"
                                class="mt-2 w-full border border-neutral-tan/80 bg-surface-cream px-3 py-2 text-slate-900 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent"
                                required
                            />
                            <p v-if="form.errors.first_name" class="mt-1 text-sm text-red-600">{{ form.errors.first_name }}</p>
                        </div>
                        <div>
                            <label for="last_name" class="block text-xs font-semibold uppercase tracking-wide text-primary">Last Name</label>
                            <input
                                id="last_name"
                                v-model="form.last_name"
                                type="text"
                                class="mt-2 w-full border border-neutral-tan/80 bg-surface-cream px-3 py-2 text-slate-900 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent"
                                required
                            />
                            <p v-if="form.errors.last_name" class="mt-1 text-sm text-red-600">{{ form.errors.last_name }}</p>
                        </div>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="phone" class="block text-xs font-semibold uppercase tracking-wide text-primary">Phone</label>
                            <input
                                id="phone"
                                v-model="form.phone"
                                type="tel"
                                class="mt-2 w-full border border-neutral-tan/80 bg-surface-cream px-3 py-2 text-slate-900 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent"
                            />
                            <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone }}</p>
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wide text-primary">Email</label>
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-2 w-full border border-neutral-tan/80 bg-surface-cream px-3 py-2 text-slate-900 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent"
                                required
                            />
                            <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-xs font-semibold uppercase tracking-wide text-primary">Message</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            rows="5"
                            class="mt-2 w-full border border-neutral-tan/80 bg-surface-cream px-3 py-2 text-slate-900 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent"
                            required
                        />
                        <p v-if="form.errors.message" class="mt-1 text-sm text-red-600">{{ form.errors.message }}</p>
                    </div>
                    <div class="text-center">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center border border-transparent bg-accent px-8 py-3 text-xs font-semibold uppercase tracking-wider text-white transition hover:bg-[#7a5d45] disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            Send Message
                        </button>
                    </div>
                    <p class="text-center text-xs text-slate-500">
                        This form is for general inquiries. We handle your information carefully and do not sell your data.
                    </p>
                </form>
            </SectionContainer>
        </section>

        <section class="relative py-24">
            <img :src="connect.comeAsYouAre" alt="" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-primary/70" />
            <SectionContainer wrapper-class="relative z-10 text-center text-white">
                <h2 class="text-3xl font-bold md:text-4xl">Come As You Are</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg text-white/90">
                    You belong before you believe everything, and you are loved more than you know. Take a step toward
                    community this week.
                </p>
                <div class="mt-10">
                    <PrimaryButton :href="route('start-here')">Plan a Visit</PrimaryButton>
                </div>
            </SectionContainer>
        </section>
    </PublicLayout>
</template>
