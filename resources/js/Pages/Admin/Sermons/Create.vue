<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const form = useForm({
    title: '',
    description: '',
    video_url: '',
    published_at: '',
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        published_at: data.published_at || null,
    })).post(route('admin.sermons.store'));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="New message" />

        <template #header>
            <div class="flex flex-wrap items-center justify-between gap-4">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">New message</h2>
                <Link :href="route('admin.sermons.index')" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                    Cancel
                </Link>
            </div>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <form class="space-y-6 bg-white p-6 shadow-sm sm:rounded-lg" @submit.prevent="submit">
                    <div>
                        <InputLabel for="title" value="Title" />
                        <TextInput
                            id="title"
                            v-model="form.title"
                            type="text"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div>
                        <InputLabel for="description" value="Short description" />
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-accent focus:ring-accent"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <div>
                        <InputLabel for="video_url" value="Video link (YouTube or Vimeo)" />
                        <TextInput
                            id="video_url"
                            v-model="form.video_url"
                            type="url"
                            class="mt-1 block w-full"
                            placeholder="https://www.youtube.com/watch?v=…"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.video_url" />
                    </div>

                    <div>
                        <InputLabel for="published_at" value="Publish date (optional)" />
                        <TextInput
                            id="published_at"
                            v-model="form.published_at"
                            type="datetime-local"
                            class="mt-1 block w-full"
                        />
                        <InputError class="mt-2" :message="form.errors.published_at" />
                    </div>

                    <div class="flex justify-end">
                        <PrimaryButton :disabled="form.processing">Save message</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
