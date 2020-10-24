<template>

    <div class="prdLt">
        <div class="prdLt_wrap">
            <div class="prdLt_image">
                <img onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                     :src="`../storage/product_images/${data.params.Бренд}/BIG/${data.photo}.png`" alt="">
            </div>
            <div class="prdLt_cont">
                <div class="prdLt_top">
                    {{ data.name }}
                </div>
                <div class="prdLt_mid">
                    <div class="prdLt_descItem">
                        <div class="prdLt_descItem-left">Бренд</div>
                        <div class="prdLt_descItem-right">{{ newParameters['Бренд'] }}</div>
                    </div>

                    <div class="prdLt_descItem" v-if="newParameters['Артикул']">
                        <div class="prdLt_descItem-left">Артикул</div>
                        <div class="prdLt_descItem-right">{{ newParameters['Артикул'] }}</div>
                    </div>

                    <div class="prdLt_descItem" v-if="newParameters['Модель']">
                        <div class="prdLt_descItem-left">Модель</div>
                        <div class="prdLt_descItem-right">{{ newParameters['Модель'] }}</div>
                    </div>

                    <div class="prdLt_descItem">
                        <div class="prdLt_descItem-left">Цвет печати картриджа</div>
                        <div class="prdLt_descItem-right">{{ newParameters['color'] }}</div>
                    </div>
                    <div class="prdLt_descItem">
                        <div class="prdLt_descItem-left">Ресурс страниц.</div>
                        <div class="prdLt_descItem-right">{{ newParameters['Ресурс'] }} текстовых страниц А4</div>
                    </div>

                    <div class="prdLt_descItem">
                        <div class="prdLt_descItem-left">Гарантия</div>
                        <div class="prdLt_descItem-right">12 мес.</div>
                    </div>
                </div>
                <div class="prdLt_bot">
                    <div class="prdLt_price">
                        <span class="prdLt_price_text">
                            {{ data.price }}
                            <img src="/images/icons/rub.svg" alt="cur"/>
                        </span>
                    </div>
                    <div class="prdLt_btns">

                        <a :href="`/product/${data.id}`">
                            <TextBtn text="Подробнее" className="further_btn animated_btn" />
                        </a>
                        <BuyBtn :id="data.id" className="action_btn animated_btn" text="В корзину" />

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import BuyBtn from '../btns/BuyBtn';
    import TextBtn from '../btns/TextBtn';
    import _ from 'lodash';

    export default {
        name: "CatalogCardList",
        props: ['data'],
        components: {
            BuyBtn,
            TextBtn
        },
        computed: {
            newParameters() {
                let params = this.$props.data.params;
                let newParams = _.pick(params, ['Бренд', 'Артикул', 'Модель', 'color', 'Ресурс', 'Гарантия']);

                return newParams;
            }
        },
        methods: {
            loadProductModal(id) {
                this.$store.dispatch('GET_PRODUCT_BY_ID', id);
            }
        }
    }
</script>

<style scoped>
    .prdLt_descItem {
        margin-bottom: 5px;
    }
    .animated_btn {
        margin-right: 30px;
    }
    .prdLt_price_text {
        display: inline-block!important;
    }
</style>
