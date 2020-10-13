<template>
    <div class="cart_check-wrap_item" data-oferta>

        <div class="cart_check-wrap_item-group agreement_checkbox">

            <div class="agreement_error as-none" data-ofertaError>
                <img src="/images/icons/tip_danger.svg" alt="tip">
                <span>Для подтверждения авторизации, необходимо ваше согласие</span>
            </div>


            <div class="as-flex">
                <SimpleCheckbox name="save" />

                <div class="agreement_text">
                    <p class="agreement_prgf">
                        Нажимая на кнопку &laquo;Продолжить&raquo; вы соглашаетесь с
                        <a class="agreement_link" target="_blank" href="/download/oferta.pdf">офертой</a> и
                        <a class="agreement_link" target="_blank" href="/download/agreement.pdf">условиями обработки персональных данных</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        name: "agreementCheck",
        components: {
            SimpleCheckbox
        },
        computed: {
            ...mapGetters(['ofertaPolicy'])
        },
        methods: {

        }
    }
</script>

<style scoped>
    .agreement_text {
        margin: 0 0 0 30px;
    }
    .agreement_prgf {
        font-family: 'Montserrat';
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 0.02em;
        color: #292930;
        max-width: 630px;
    }
  .agreement_prgf {
      margin: 0;
  }
</style>
