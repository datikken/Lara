<template>
    <div class="dform_outer">
        <div class="dform">
            <div class="dform_head">
                <h2 class="dform_head">Поздравляем!</h2>
                <span class="dform_head_span"><b>Ваш заказ сформирован и готовится к отправке</b></span>
            </div>
            <div class="dform_desc">
                <p class="dform_desc_text">Пожалуйста, ознакомьтесь с условиями
                    <a href="#"><b>договора</b></a> и
                    <a href="/admin/downloadDocument/oferta.pdf">
                        <b>политикой компании</b>
                    </a>.
                </p>
                <p class="dform_desc_text"><b>Нажимая</b> на галочку и кнопку продолжить, вы соглашаетесь с нашими
                    условиями.
                    После того как вы нажмете на кнопку продолжить, вам на почту будет выставлен счет на оплату,
                    которой должен быть оплачен спустя 0 рабочих дней с момента выставления счета.
                </p>
            </div>
            <div class="dform_boxes">
                <div class="dform_boxes_inner">
                    <SimpleCheckbox/>
                    <span class="dform_boxes_text">Политика компании</span>
                </div>
                <div class="dform_boxes_inner">
                    <SimpleCheckbox/>
                    <span class="dform_boxes_text">Условия договора</span>
                </div>

            </div>

            <div class="dform_download">
                <p class="dform_download_head">Наш договор можно скачать или отправить на почту ответственному за
                    подпись лицу</p>

                <div class="dform_download_btns">
                    <div class="dform_btn" @click="setClass">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dform_btn_icon" width="11" height="15"
                             viewBox="0 0 11 15" fill="none">
                            <path
                                d="M5.99214 14.7957L10.4559 10.332C10.7282 10.0596 10.7282 9.61794 10.4559 9.34559C10.1835 9.07319 9.74192 9.07319 9.46952 9.34559L6.19642 12.6187L6.19642 0.697461C6.19642 0.312295 5.88412 -2.08767e-07 5.49895 -2.25603e-07C5.11384 -2.42437e-07 4.80149 0.312295 4.80149 0.697461L4.80149 12.6187L1.52839 9.34571C1.25599 9.0733 0.814411 9.0733 0.542011 9.34571C0.405922 9.48185 0.337739 9.6604 0.337739 9.83889C0.337739 10.0174 0.405921 10.1959 0.542011 10.3321L5.00576 14.7957C5.27817 15.0681 5.71974 15.0681 5.99214 14.7957Z"
                                fill="#40404C"/>
                        </svg>
                        <div class="dform_btn_text">Скачать договор</div>
                    </div>

                    <div class="dform_btn dform_btn_active" @click="setClass">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"
                             class="dform_btn_icon">
                            <path
                                d="M14.8881 0.600323C14.7583 0.455012 14.5536 0.416048 14.3839 0.490168L0.262949 6.67176C0.106505 6.74031 0.00367393 6.89354 -0.00013463 7.06463C-0.00394319 7.23543 0.0918568 7.39304 0.245371 7.46863L3.61712 9.12682L4.45735 14.1676C4.4846 14.3589 4.63489 14.5127 4.83059 14.5405C4.97121 14.5608 5.11096 14.5112 5.20764 14.4116L7.86953 11.7497L11.6681 14.4632C11.79 14.5499 11.947 14.569 12.0853 14.5142C12.2239 14.4594 12.3253 14.3378 12.3546 14.1916L14.9913 0.978836C15.0173 0.84788 14.9836 0.707549 14.8881 0.600323ZM3.96517 8.31852L1.48228 7.09744L11.2914 2.80343L3.96517 8.31852ZM5.34035 9.62486L4.93166 11.6683L4.49075 9.02282L9.88045 4.96552L5.46017 9.40074C5.39807 9.46285 5.35676 9.54371 5.34035 9.62486ZM5.60783 12.7684L6.06896 10.4636L7.14444 11.2318L5.60783 12.7684ZM11.6257 13.3526L6.44806 9.65445L13.8446 2.23332L11.6257 13.3526Z"
                                fill="#40404C"/>
                        </svg>
                        <div class="dform_btn_text">Отправить на почту</div>
                    </div>
                </div>
            </div>

            <TextBtn text="Завершить покупку" className="text_buy-btn animated_btn" @click.native="pushToThanks"/>

        </div>

        <OrderList/>

    </div>
</template>

<script>
    import OrderList from '../components/orders/OrdersList'
    import SimpleCheckbox from '../components/checkboxes/SimpleCheckbox'
    import TextBtn from '../components/btns/TextBtn'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: "Contract",
        components: {
            OrderList,
            SimpleCheckbox,
            TextBtn
        },
        methods: {
            ...mapActions([
                'FINISH_CONTRACT'
            ]),
            setClass(e) {
                let btns = this.$el.querySelectorAll('.dform_btn')
                btns.forEach((btn) => {
                    btn.classList.remove('dform_btn_active')
                })

                e.currentTarget.classList.toggle('dform_btn_active')
            },
            pushToThanks() {
                this.FINISH_CONTRACT();

            }
        },
        computed: {
            ...mapGetters(['orderPaid', 'paymentProvider'])
        }
    }
</script>

<style scoped>
    .text_buy-btn {
        margin-top: 55px;
    }
</style>
