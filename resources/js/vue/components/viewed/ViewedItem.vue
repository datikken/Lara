<template>
    <a class="viewed_wrapper-item" :href="`/product/${data.id}`">
        <div class="viewed_wrapper-item_image">
            <img onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                :src="`../storage/product_images/${data.params.Бренд}/SMALL/${data.photo}.png`" />
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
        },
        created() {
            console.warn(this.$props.data)
        }
    }
</script>

<style scoped>

</style>
