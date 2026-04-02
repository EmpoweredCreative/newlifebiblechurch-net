<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    embedUrl: { type: String, default: '' },
});
</script>

<template>
    <PublicLayout>
        <Head title="Privacy Policy" />

        <div class="border-b border-neutral-tan/60 bg-white py-10">
            <SectionContainer wrapper-class="!py-0">
                <h1 class="text-3xl font-bold text-primary">Privacy Policy</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Policies are provided by Termageddon. Add <code class="rounded bg-surface-cream px-1">TERMAGEDDON_PRIVACY_EMBED_URL</code> to your
                    <code class="rounded bg-surface-cream px-1">.env</code> to display the live embed.
                </p>
            </SectionContainer>
        </div>

        <div class="min-h-[50vh] bg-surface-cream py-8">
            <iframe
                v-if="embedUrl"
                :src="embedUrl"
                title="Privacy Policy"
                class="h-[min(80vh,1200px)] w-full border-0"
            />
            <SectionContainer v-else wrapper-class="text-center text-slate-600">
                <p>Embed URL not configured.</p>
            </SectionContainer>
        </div>
    </PublicLayout>
</template>
