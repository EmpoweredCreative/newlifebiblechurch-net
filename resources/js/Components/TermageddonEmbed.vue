<script setup>
import { computed, onBeforeUnmount, onMounted, ref, watch } from 'vue';

const props = defineProps({
    /** Opaque ID from Termageddon (matches embed script URL path). */
    policyId: { type: String, default: '' },
});

const policyLink = computed(() =>
    props.policyId ? `https://policies.termageddon.com/api/policy/${props.policyId}` : '',
);

const appendedScript = ref(null);

function appendEmbedScript() {
    if (!props.policyId || typeof document === 'undefined') {
        return;
    }

    const selector = `script[data-termageddon-embed="${props.policyId}"]`;
    if (document.querySelector(selector)) {
        return;
    }

    const script = document.createElement('script');
    script.src = `https://policies.termageddon.com/api/embed/${props.policyId}.js`;
    script.async = true;
    script.dataset.termageddonEmbed = props.policyId;
    document.body.appendChild(script);
    appendedScript.value = script;
}

onMounted(() => {
    appendEmbedScript();
});

watch(
    () => props.policyId,
    (next, prev) => {
        if (prev && appendedScript.value?.parentNode) {
            appendedScript.value.parentNode.removeChild(appendedScript.value);
            appendedScript.value = null;
        }
        appendEmbedScript();
    },
);

onBeforeUnmount(() => {
    if (appendedScript.value?.parentNode) {
        appendedScript.value.parentNode.removeChild(appendedScript.value);
    }
});
</script>

<template>
    <div
        v-if="policyId"
        :id="policyId"
        class="policy_embed_div mx-auto min-h-[480px] w-full max-w-3xl"
        aria-live="polite"
        aria-busy="true"
    >
        Please wait while the policy is loaded. If it does not load, please
        <a
            rel="nofollow"
            aria-label="click here to view the policy"
            :href="policyLink"
            target="_blank"
            class="text-accent underline hover:no-underline"
        >
            click here to view the policy
        </a>.
    </div>
</template>
