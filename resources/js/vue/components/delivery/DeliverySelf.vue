<template>
    <div class="delSelf form_group address_group as-none">
        <label
            for="lastaddress"
            class="delSelf_label form_group-label">
            {{ text }}
        </label>

        <input class="delSelf_input" type="text" name="lastaddress" :value="adress"/>

        <div class="delSelf_btns btns_wrap">
            <div class="delSelf_btn magic_btn" @click="acceptCurrentAdress">
                <span class="form_group-btn_item">Продолжить с этим адресом</span>
            </div>
            <div class="delSelf_btn flat_btn" @click="changeAdress">
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
            let that = this;

            let btns = this.$el.querySelectorAll('.magic_btn')
                btns.forEach(btn => that.CREATE_MAGIC_BTN(btn))
        },
        methods: {
            ...mapActions([
                'GET_LAST_DELIVERY_ADRESS',
                'PROCEED_WITH_LAST_DELIVERY_ADRESS',
                'SET_ADDITIONAL_FORMS',
                'SET_READY_TO_GO',
                'CREATE_MAGIC_BTN',
                'SHOW_NOTIFICATION'
            ]),
           fillInputAdress({street, building, city, flat, house, index}) {
               let str = `${street} ${building} ${city} ${flat} ${house} ${index}`;

               this.adress = str;
           },
            changeAdress() {
                let npt = this.$el.querySelector('[name="lastaddress"]');
                    npt.removeAttribute('disabled')
                let btn = this.$el.querySelector('.delSelf_btn');
                    btn.classList.add('disabled_btn');

                this.SET_READY_TO_GO(false);
            },
            blockBtnsAndInput() {
                let npt = this.$el.querySelector('[name="lastaddress"]');
                    npt.setAttribute('disabled', true)
                let btn = this.$el.querySelector('.delSelf_btn');
                    btn.classList.add('disabled_btn')
            },
            acceptCurrentAdress() {
                if(this.adress) {
                    this.PROCEED_WITH_LAST_DELIVERY_ADRESS(this.adress);
                    this.blockBtnsAndInput();
                    this.SET_READY_TO_GO(true);
                } else {
                    this.SHOW_NOTIFICATION('Попробуйте сначала', 'danger');
                }
            }
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
                }
            }
        }
    }
</script>
