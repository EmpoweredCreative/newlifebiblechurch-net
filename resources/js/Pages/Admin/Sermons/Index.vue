<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { computed } from 'vue';

const props = defineProps({
    sermons: {
        type: Array,
        default: () => [],
    },
});

const page = usePage();
const flash = computed(() => page.props.success);
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Messages" />

        <template #header>
            <div class="flex flex-wrap items-center justify-between gap-4">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Messages</h2>
                <PrimaryButton :href="route('admin.sermons.create')">New message</PrimaryButton>
            </div>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <p v-if="flash" class="mb-4 rounded-sm bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ flash }}
                </p>

                <div v-if="sermons.length" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Title
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Published
                                </th>
                                <th class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="s in sermons" :key="s.id">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ s.title }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    {{
                                        s.published_at
                                            ? new Date(s.published_at).toLocaleDateString(undefined, {
                                                  year: 'numeric',
                                                  month: 'short',
                                                  day: 'numeric',
                                              })
                                            : '—'
                                    }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                    <Link
                                        :href="route('admin.sermons.edit', s.id)"
                                        class="text-accent hover:underline"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        :href="route('admin.sermons.destroy', s.id)"
                                        method="delete"
                                        as="button"
                                        class="ms-4 text-red-600 hover:underline"
                                        @click="(e) => !confirm('Remove this message?') && e.preventDefault()"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else class="rounded-sm bg-white p-8 text-center text-gray-600 shadow-sm">
                    No messages yet. Create one to show it on the Media page.
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
