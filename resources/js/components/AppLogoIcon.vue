<script setup lang="ts">
import { GraduationCap } from '@lucide/vue';

defineOptions({
    inheritAttrs: false,
});
</script>

<template>
    <div class="flex items-center gap-2">
        <span class="text-5xl text-primary" :class="$attrs.class"
            ><GraduationCap
        /></span>
        <!-- <span class="font-headline-md text-headline-md font-bold text-primary"
            >Studyflow</span
        > -->
    </div>
</template>
