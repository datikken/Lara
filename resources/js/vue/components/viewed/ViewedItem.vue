<template>
    <div class="viewed_wrapper-item">
        <div class="viewed_wrapper-item_image">
            <img :src="`../storage/product_images/${data.params.brand}/SMALL/${data.photo}.png`" alt="" />
        </div>
        <div class="viewed_wrapper-item_text">
            <div class="viewed_wrapper-item_text-heading">
                <span class="viewed_wrapper-item_text-heading-item">
                  {{ data.name | truncate(30) }}
                </span>
            </div>
            <div class="viewed_wrapper-item_text-price">
                <span>{{ data.price }}</span>
                <img src="/images/icons/rub.svg" alt="rub" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViewedItem",
        props: ['data'],
        created() {
            console.warn('fixes', this.$props.data);
        }
    }
</script>

<style scoped>

</style>
