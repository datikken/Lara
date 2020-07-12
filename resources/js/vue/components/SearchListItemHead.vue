<template>
    <div class="sres_head">
        <div class="sres_head_item">
            Цвет
        </div>
        <div class="sres_head_item">
            Картридж
        </div>
        <div class="sres_head_item">
            {{ type }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchListItemHead",
        props: ['type']
    }
</script>
