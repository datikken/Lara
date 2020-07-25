<template>
    <div :class="`action_btn ${className}`">
        <div class="action_btn-item">{{ text }}</div>
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
