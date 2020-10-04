<template>
    <div class="postDelForm">
        <div class="postDelForm_inner">

            <div class="postDelForm_item">
                <div class="form_group">
                    <label class="form_group_label" for="city">Город</label>
                    <input class="form_group_input" type="text" name="city" placeholder="выберите город" data-required />
                    <label class="form_group_message" for="required" >Поле город обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="index">Индекс</label>
                    <input class="form_group_input" type="text" name="index" placeholder="введите индекс"  data-required />
                    <label  class="form_group_message" for="required">Поле индекс обязательно к заполнению</label>
                </div>
            </div>
            <div class="postDelForm_item">
                <div class="form_group">
                    <label class="form_group_label" for="street">Улица</label>
                    <input class="form_group_input" type="text" name="street" data-required placeholder="введите улицу" />
                    <label class="form_group_message" for="required" >Поле улица обязательно к заполнению</label>
                </div>
            </div>
            <div class="postDelForm_item postDelForm_item-four">
                <div class="form_group">
                    <label class="form_group_label" for="home">Дом</label>
                    <input class="form_group_input" type="number" name="street" placeholder="номер"  data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="wing">Корпус</label>
                    <input class="form_group_input" type="number" name="wing" placeholder="номер" data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="building">Строение</label>
                    <input class="form_group_input" type="number" name="building" placeholder="номер" data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label as-flex gap5" for="flat">Квартира/офис <span class="required">*</span></label>
                    <input class="form_group_input" type="number" name="flat" placeholder="номер" data-required />
                </div>
            </div>

            <div class="form_group">
                <span class="form_group_tip as-flex gap5"><span class="required">*</span> если у вас частный дом, то в поле квартира введите цифру 1</span>
            </div>

        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "DeliveryPostForm",
        components: {
            TextBtn
        },
        methods: {
            handleValidatePostForm() {
                let groups = this.$el.querySelectorAll('.form_group');
                    groups.forEach(grp => {
                        let npt = grp.querySelector('input');

                        if(npt.value === '') {
                            grp.classList.add('form_group-error');
                        }
                    })
            }
        },
        computed: {
            ...mapGetters(["validatePostForm"]),
        },
        watch: {
            validatePostForm(newVal, oldVal) {
                if(newVal) {
                    this.handleValidatePostForm();
                }
            }
        }
    }
</script>
