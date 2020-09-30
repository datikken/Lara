<template>
    <div :class="`action_btn ${className}`">
        <span class="action_btn-item">{{ text }}</span>
    </div>
</template>

<script>
    export default {
        name: "TextBtn",
        props: ['text','className']
    }
</script>

<style scoped>

</style>
