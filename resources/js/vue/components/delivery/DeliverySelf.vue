<template>
    <div class="delSelf form_group address_group as-none">
        <label
            for="lastaddress"
            class="delSelf_label form_group-label">
            {{ text }}
        </label>

        <input class="delSelf_input" type="text" name="lastaddress" :value="adress"/>

        <div class="delSelf_btns btns_wrap">
            <div class="delSelf_btn animated_btn">
                <span class="form_group-btn_item">Продолжить с этим адресом</span>
            </div>
            <div class="delSelf_btn flat_btn">
                <span class="form_group-btn_item">Изменить адрес выдачи</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "DeliverySelf",
        props: ['text', 'type'],
        data: function () {
            return {
                adress: ''
            }
        },
        computed: {
            ...mapGetters(['lastDeliveryAdress'])
        },
        mounted() {
            this.GET_LAST_DELIVERY_ADRESS();
        },
        methods: {
            ...mapActions([
                'GET_LAST_DELIVERY_ADRESS',
                'SET_ADDITIONAL_FORMS'
            ]),
           fillInputAdress({street, building, city, flat, house, index}) {
               let npt = this.$el.querySelector('[name="lastaddress"]');
               npt.value = `${street} ${building} ${city} ${flat} ${house} ${index}`;

               console.warn('fillInputAdress', npt.value)


           },
        },
        watch: {
            lastDeliveryAdress(newVal, oldVal) {
                let that = this;

                if (newVal === null) {
                    this.SET_ADDITIONAL_FORMS();
                } else {
                    this.$el.classList.remove('as-none');
                    this.adress = newVal;

                    this.fillInputAdress(this.adress.adress);

                    console.warn('GET_LAST_DELIVERY_ADRESS', this.adress.adress)
                }
            }
        }
    }
</script>
