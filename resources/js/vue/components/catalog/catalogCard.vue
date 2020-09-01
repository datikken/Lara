<template>

    <div class="product">
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_name">
                </div>
                <div class="product_wrapper-item_heading">
                    <span class="product_wrapper-item_heading-item">
                        {{ data.name }}
                    </span>
                </div>

                <div class="product_wrapper-item_amount">
                    <img src="/images/icons/alot.svg" alt="amount"/>
                    <span class="product_wrapper-item_amount-item">Много</span>
                </div>
            </div>
            <div class="product_wrapper-item product_wrapper-itemContent">
                <a class="product_wrapper-item_image product_link" :href="`/product/${data.id}`">
                    <img onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                         :src="`../storage/product_images/${data.params.Бренд}/SMALL/${data.photo}.png`" alt="">
                </a>
                <a class="product_wrapper-item_overlay" href="#modal-1" uk-toggle :data-id="data.id" @click="loadProductModal(data.id)">
                    <div class="product_wrapper-item_overlay_wrapper">
                        <div class="product_wrapper-item_overlay_wrapper-item">
                            <span class="product_wrapper-item_overlay_wrapper-item_text">быстрый просмотр</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_head">
                    <span class="product_wrapper-item_head-item">Картридж</span>
                    <span class="product_wrapper-item_head-item">IC-HLOR70A</span>
                </div>
                <div class="product_wrapper-item_price">
                    <span class="product_wrapper-item_price-item">{{ data.price }}</span>
                    <img src="/images/icons/rub.svg" alt="cur"/>
                </div>

                <BuyBtn :id="data.id" className="animated_btn" />

            </div>
        </div>
    </div>

</template>

<script>
    import BuyBtn from '../btns/BuyBtn';
    import TextBtn from '../btns/TextBtn';

    export default {
        name: "CatalogCard",
        props: ['data'],
        components: {
            BuyBtn,
            TextBtn
        },
        methods: {
            loadProductModal(id) {
                this.$store.dispatch('GET_PRODUCT_BY_ID', id);
            }
        }
    }
</script>
