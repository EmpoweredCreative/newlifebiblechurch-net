<script setup>
import { computed, nextTick, onBeforeUnmount, onMounted, ref, watch } from 'vue';

const props = defineProps({
    /** Opaque ID from Termageddon (matches embed script URL path). */
    policyId: { type: String, default: '' },
});

const policyLink = computed(() =>
    props.policyId ? `https://policies.termageddon.com/api/policy/${props.policyId}` : '',
);

const embedRoot = ref(null);
const appendedScript = ref(null);

function appendEmbedScript() {
    if (!props.policyId || typeof document === 'undefined') {
        return;
    }

    const selector = `script[data-termageddon-embed="${props.policyId}"]`;
    if (document.querySelector(selector)) {
        return;
    }

    const anchor = embedRoot.value;
    if (!anchor?.isConnected) {
        return;
    }

    const script = document.createElement('script');
    script.src = `https://policies.termageddon.com/api/embed/${props.policyId}.js`;
    script.async = true;
    script.dataset.termageddonEmbed = props.policyId;
    // Match Termageddon’s snippet: script immediately after the policy div.
    anchor.after(script);
    appendedScript.value = script;
}

onMounted(async () => {
    await nextTick();
    appendEmbedScript();
});

watch(
    () => props.policyId,
    async (next, prev) => {
        if (prev && appendedScript.value?.parentNode) {
            appendedScript.value.parentNode.removeChild(appendedScript.value);
            appendedScript.value = null;
        }
        await nextTick();
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
        ref="embedRoot"
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
