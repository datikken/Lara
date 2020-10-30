<template>
    <div :class="className">
        <span>{{ text }}</span>
    </div>
</template>

<script>
    export default {
        name: "TextBtn",
        props: ['text','className']
    }
</script>
