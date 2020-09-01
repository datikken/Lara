<template>
    <a class="viewed_wrapper-item" :href="`/product/${data.id}`">
        <div class="viewed_wrapper-item_image">
            <img :src="`../storage/product_images/${data.params.Бренд}/SMALL/${data.photo}.png`" alt="" />
        </div>
        <div class="viewed_wrapper-item_text">
            <div class="viewed_wrapper-item_text-heading">
                <span class="viewed_wrapper-item_text-heading-item">
                  {{ data.name | truncate(30) }}
                </span>
            </div>
            <div class="viewed_wrapper-item_text-price">
                <span>{{ data.price | floor }}</span>
                <img src="/images/icons/rub.svg" alt="rub" />
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name: "ViewedItem",
        props: ['data'],
        filters: {
            floor: function (value) {
                return Math.ceil(value);
            }
        }
    }
</script>

<style scoped>

</style>
