<template>
    <div class="product">
        <!--<div class="product" data-category="{{ $category }}" id="product-{{ $id }}">-->
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_name">
                    <!--<span class="product_wrapper-item_name-item">{{ data.name }}</span>-->
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
                    <img :src="`../storage/product_images/${data.params.brand}/SMALL/${data.photo}.png`" alt="">
                </a>
                <a class="product_wrapper-item_overlay" :href="`#modal-${ data.id }`" uk-toggle :data-id="data.id">
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
                    <span class="product_wrapper-item_price-item"></span>
                    <img src="/images/icons/rub.svg" alt="cur" />
                </div>

                <!--<a href="#" class="ajaxGETproduct" data-url="{{ route('AddToCartAjaxGet', ['id' => $id]) }}">-->
                    <!--@include('components.btn.buy_btn')-->
                <!--</a>-->

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CatalogCard",
        props: ['data'],
        created: function() {
            let col = this.$props.data;


            console.log(this.data)
        }
    }
</script>

<style scoped></style>
