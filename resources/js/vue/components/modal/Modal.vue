<template>
    <div id="modal-1" class="uk-flex-top" uk-modal>
        <div id="modal_content" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <div class="prdet">

                <div class="prdet_wrap">
                    <div class="prdet_wrap-item">
                        <div class="prdet_wrap-item_img">
                            <img class="prdet_wrap-item_img_inner"
                                 onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                                 v-if="singleProduct.params"
                                 :src="`../storage/product_images/${singleProduct.params.Бренд}/SMALL/${singleProduct.photo}.png`"
                                 alt="">
                        </div>
                    </div>
                    <div class="prdet_wrap-item">

                        <div class="prdet_wrap-item-head">
                            <span class="prdet_wrap-item-head-item">
                                 {{ singleProduct.name }}
                            </span>
                        </div>

                        <div class="prdet_wrap-item-icons" v-if="singleProduct.params">
                            <div class="prdet_wrap-item-icons-item"
                                 style="background-image: url('/images/product/drip.svg')"></div>
                            <div v-if="singleProduct.params.chip"
                                 class="prdet_wrap-item-icons-item"
                                 style="background-image: url('/images/product/chip.svg')"></div>
                            <div v-if="singleProduct.params.new"
                                 class="prdet_wrap-item-icons-item"
                                 style="background-image: url('/images/product/new.svg')"></div>
                            <div v-if="singleProduct.params.STMC"
                                 class="prdet_wrap-item-icons-item"
                                 style="background-image: url('/images/product/stmc.svg')"></div>
                        </div>

                        <div class="prdet_wrap-item-stuff">
                            <span>Фотобарабан Mitsubishi Chemical Corporation, тонер Mitsubishi Chemical Corporation </span>
                            <span>ОЕМ-номер: <b>CE285A.</b></span>
                            <span><b data-paramres>1 600</b> текстовых страниц <b>А4</b> согласно ASTM F1856/STMC для картриджей «Всё в одном»</span>
                        </div>

                        <div class="prdet_wrap-icons_ctas">
                            <div class="prdet_wrap-icons_ctas-amount">
                                <PriceBtn :price="singleProduct.price"/>
                            </div>
                            <div class="prdet_wrap-icons_ctas-increase">
                                <span class="prdet_wrap-icons_ctas-increase-text">Количество (шт)</span>
                                <AmountBtn :id="singleProduct.id" quantity="1" />
                            </div>
                            <div class="prdet_wrap-icons_ctas-buy">
                                <BuyBtn text="в корзину" className="text_buy-btn animated_btn uk-modal-close" :id="singleProduct.id"/>
                            </div>
                            <a class="prdet_wrap-icons_ctas-details" :href="`/product/${singleProduct.id}`">
                                <TextBtn className="prdet_btn" text="подробнее" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="prdet_comp">
                    <div class="prdet_comp-item">
                        <span class="prdet_comp-item-head">Подходит</span>
                    </div>

                    <div class="prdet_comp-item">
                        <div class="prdet_table">

                            <div class="prdet_table_head">
                                <div class="prdet_table_head_item">
                                    <span>Марка</span>
                                </div>
                                <div class="prdet_table_head_item">
                                    <span>Модель</span>
                                </div>
                            </div>


                            <div class="prdet_table_item" v-for="(index, item) in singleProduct.cape">
                                <div class="prdet_table_item_inner">
                                    <span>{{ item }}</span>
                                </div>
                                <div class="prdet_table_item_inner">
                                    <span>{{ index }}</span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import PriceBtn from '../btns/PriceBtn'
    import BuyBtn from '../btns/BuyBtn'
    import AmountBtn from '../btns/AmountBtn'
    import TextBtn from '../btns/TextBtn'
    import {mapActions} from 'vuex'

    export default {
        name: "Modal",
        components: {
            BuyBtn,
            PriceBtn,
            AmountBtn,
            TextBtn
        },
        computed: {
            singleProduct() {
                return this.$store.state.singleProduct;
            }
        },
        methods: {
            ...mapActions([
                'SEND_GOOGLE_ANALYTICS'
            ])
        },
        created() {
            let gObj = {
                category: 'catalog modal',
                eventAction: 'click',
                eventLabel: 'catalog modal opened',
                eventValue: singleProduct.id
            };

            this.SEND_GOOGLE_ANALYTICS(gObj);
        }
    }
</script>

<style scoped>

</style>
