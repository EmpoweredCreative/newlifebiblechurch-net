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
        <Head title="Terms & Conditions" />

        <div class="border-b border-neutral-tan/60 bg-white py-10">
            <SectionContainer wrapper-class="!py-0">
                <h1 class="text-3xl font-bold text-primary">Terms &amp; Conditions</h1>
            </SectionContainer>
        </div>

        <div class="min-h-[50vh] bg-surface-cream py-8">
            <SectionContainer v-if="embedId" wrapper-class="!py-0">
                <TermageddonEmbed :policy-id="embedId" />
            </SectionContainer>
            <SectionContainer v-else wrapper-class="text-center text-slate-600">
                <p>
                    The terms and conditions are not available online at the moment. Please contact the church
                    office if you need a copy.
                </p>
            </SectionContainer>
        </div>
    </PublicLayout>
</template>
