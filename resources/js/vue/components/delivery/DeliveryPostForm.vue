<template>
    <div class="postDelForm">
        <div class="postDelForm_item">
            <div class="form_group">
                <label class="form_group_label" for="city">Город</label>
                <input class="form_group_input" type="text" name="city" placeholder="выберите город" data-required />
                <label class="form_group_message" for="required" >Поле имя обязательно к заполнению</label>
            </div>
            <div class="form_group">
                <label class="form_group_label" for="index">Индекс</label>
                <input class="form_group_input" type="text" name="index" placeholder="введите индекс"  data-required />
                <label  class="form_group_message" for="required">Поле имя обязательно к заполнению</label>
            </div>
        </div>
        <div class="postDelForm_item">
            <div class="form_group">
                <label class="form_group_label" for="street">Улица</label>
                <input class="form_group_input" type="text" name="street" data-required placeholder="введите улицу" />
                <label class="form_group_message" for="required" >Поле имя обязательно к заполнению</label>
            </div>
        </div>
        <div class="postDelForm_item">
            <div class="form_group">
                <label class="form_group_label" for="home">Дом</label>
                <input class="form_group_input" type="text" name="street" placeholder="номер"  data-required />
            </div>
            <div class="form_group">
                <label class="form_group_label" for="wing">Корпус</label>
                <input class="form_group_input" type="text" name="wing" placeholder="номер" data-required />
            </div>
            <div class="form_group">
                <label class="form_group_label" for="building">Строение</label>
                <input class="form_group_input" type="text" name="building" placeholder="номер" data-required />
            </div>
            <div class="form_group">
                <label class="form_group_label" for="flat">Квартира/офис</label>
                <input class="form_group_input" type="text" name="flat" placeholder="номер" data-required />
            </div>
        </div>

        <div class="postDelForm_item">
            <div class="form_group">
                <span class="form_group_tip">* если у вас частный дом, то в поле квартира введите цифру 1</span>
            </div>
        </div>

    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "DeliveryPostForm",
        components: {
            TextBtn
        }
    }
</script>

<style scoped>

</style>
