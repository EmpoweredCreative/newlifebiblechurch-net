<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SectionContainer from '@/Components/SectionContainer.vue';
import TermageddonEmbed from '@/Components/TermageddonEmbed.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    embedId: { type: String, default: '' },
});
</script>

<template>
    <PublicLayout>
        <Head title="Privacy Policy" />

        <div class="border-b border-neutral-tan/60 bg-white py-10">
            <SectionContainer wrapper-class="!py-0">
                <h1 class="text-3xl font-bold text-primary">Privacy Policy</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Policy content is provided by Termageddon. Set
                    <code class="rounded bg-surface-cream px-1">TERMAGEDDON_PRIVACY_EMBED_ID</code> in your
                    <code class="rounded bg-surface-cream px-1">.env</code> to load the live policy.
                </p>
            </SectionContainer>
        </div>

        <div class="min-h-[50vh] bg-surface-cream py-8">
            <SectionContainer v-if="embedId" wrapper-class="!py-0">
                <TermageddonEmbed :policy-id="embedId" />
            </SectionContainer>
            <SectionContainer v-else wrapper-class="text-center text-slate-600">
                <p>Termageddon embed ID not configured.</p>
            </SectionContainer>
        </div>
    </PublicLayout>
</template>
