<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';

const page = usePage();
const errorMessage = computed(() => page.props.error);

// Set immediately in setup (not only in onMounted) so form_started_at is never 0, which fails Laravel's min:1 rule.
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    website: '',
    form_started_at: Date.now(),
});

onMounted(() => {
    form.form_started_at = Date.now();
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
            form.form_started_at = Date.now();
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Request an account" />

        <p class="mb-4 text-sm text-gray-600">
            Submit this form to request access. An administrator will review your registration and you will receive an
            email when your account is approved.
        </p>

        <div
            v-if="errorMessage"
            class="mb-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-800"
            role="alert"
        >
            {{ errorMessage }}
        </div>

        <p
            v-if="form.errors.form_started_at"
            class="mb-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-800"
            role="alert"
        >
            {{ form.errors.form_started_at }}
        </p>

        <form class="relative" @submit.prevent="submit">
            <div
                class="absolute -left-[10000px] h-0 w-0 overflow-hidden"
                aria-hidden="true"
            >
                <label for="reg_website">Website</label>
                <input
                    id="reg_website"
                    v-model="form.website"
                    type="text"
                    name="website"
                    tabindex="-1"
                    autocomplete="off"
                />
            </div>

            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Already have an account?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Submit request
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
