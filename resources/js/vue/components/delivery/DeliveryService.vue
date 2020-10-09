<template>
    <div class="delServ">
        <div class="delServ_inner">

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="city">Город</label>
                    <input class="form_group_input" :value="this.city" type="text" name="city" placeholder="выберите город" data-required />
                    <label class="form_group_message" for="required" >Поле город обязательно к заполнению</label>
                </div>
            </div>

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="street">Улица</label>
                    <input class="form_group_input" :value="this.street"  type="text" name="street" placeholder="введите улицу" data-required />
                    <label class="form_group_message" for="required" >Поле улица обязательно к заполнению</label>
                </div>
            </div>

            <div class="delServ_item delServ_item-seven">
                <div class="form_group">
                    <label class="form_group_label" for="home">Дом</label>
                    <input class="form_group_input"  :value="this.house" type="text" name="home" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле дом обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Корпус</label>
                    <input class="form_group_input" type="text" name="wing" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле корпус обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Строение</label>
                    <input class="form_group_input" type="text" name="building" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле cтроение обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Подъезд</label>
                    <input class="form_group_input" type="text" name="city" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле подъезд обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Домофон</label>
                    <input class="form_group_input" type="text" name="city" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле домофон обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Этаж</label>
                    <input class="form_group_input" type="text" name="city" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле этаж обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="city">Квартира/офис</label>
                    <input class="form_group_input" type="text" name="city" placeholder="номер" data-required />
                    <label class="form_group_message" for="required" >Поле квартира/офис обязательно к заполнению</label>
                </div>
            </div>

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="deliverNote">Примечание</label>
                    <textarea name="deliverNote" cols="30" rows="10" placeholder="введите текст"></textarea>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'
    import {mapGetters} from 'vuex';

    export default {
        name: "DeliveryService",
        props: ['adr'],
        data: function () {
            return {
                city: null,
                street: null,
                house: null,
                index: null
            }
        },
        computed: {
            ...mapGetters([
                'deliveryAdress'
            ])
        },
        components: {
            TextBtn
        },
        mounted() {
            this.syncForms(this.deliveryAdress);
        },
        methods: {
            validateDeliveryService() {

            },
            syncForms(adr) {
                if(this.deliveryAdress) {
                    let splitValues = adr.split(',');

                    this.city = splitValues[0];
                    this.street = splitValues[1];
                    this.index = splitValues[3];

                    let hsbd = splitValues[2].split(' ');

                    this.house = hsbd[2];
                    this.building = hsbd[4];
                }
            }
        }
    }
</script>
