<template>
    <div class="cart_check-wrap_item" data-oferta>
        <div class="cart_check-wrap_item-group checkbox">
            <SimpleCheckbox name="save" @click.native="saveDataToStorage" />
            <label for="save">Нажимая на кнопку &laquo;Продолжить&raquo; вы соглашаетесь с&nbsp;<a href="#oferta">офертой</a>&nbsp;и&nbsp;<a href="#personalData">условиями обработки персональных данных</a></label>
        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'

    export default {
        name: "agreementCheck",
        components: {
            SimpleCheckbox
        }
    }
</script>

<style scoped>

</style>
