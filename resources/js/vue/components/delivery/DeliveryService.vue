<template>
    <div class="delServ" data-deliveryService>
        <div class="delServ_inner">

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="city">Город</label>
                    <input class="form_group_input" :value="this.city" type="text" name="city" placeholder="выберите город" data-required />
                    <label class="form_group_message">Поле город обязательно к заполнению</label>
                </div>
            </div>

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="street">Улица</label>
                    <input class="form_group_input" :value="this.street"  type="text" name="street" placeholder="введите улицу" data-required />
                    <label class="form_group_message">Поле улица обязательно к заполнению</label>
                </div>
            </div>

            <div class="delServ_item delServ_item-seven">
                <div class="form_group">
                    <label class="form_group_label" for="home">Дом</label>
                    <input class="form_group_input"  :value="this.house" type="text" name="home" placeholder="номер" data-required />
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
                    <label class="form_group_label" for="porch">Подъезд</label>
                    <input class="form_group_input" type="text" name="porch" placeholder="номер" data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="intercom">Домофон</label>
                    <input class="form_group_input" type="text" name="intercom" placeholder="номер" data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="floor">Этаж</label>
                    <input class="form_group_input" type="text" name="floor" placeholder="номер" data-required />
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="flat">Квартира/офис</label>
                    <input class="form_group_input" type="text" name="flat" placeholder="номер" data-required />
                </div>
            </div>

            <div class="delServ_item">
                <div class="form_group">
                    <label class="form_group_label" for="deliverNote">Примечание</label>
                    <textarea name="deliveryNote" cols="30" rows="10" placeholder="введите текст"></textarea>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'
    import {mapGetters,mapActions} from 'vuex';

    export default {
        name: "DeliveryService",
        props: ['adr'],
        data: function () {
            return {
                city: null,
                street: null,
                house: null,
                index: null,
                groups: []
            }
        },
        computed: {
            ...mapGetters([
                'deliveryAdress',
                'deliveryType'
            ])
        },
        components: {
            TextBtn
        },
        mounted() {
            let form = document.querySelector('[data-deliveryService]');
            this.groups = form.querySelectorAll('.form_group');

            // console.log('before sync', this.deliveryAdress)

            this.syncForms(this.deliveryAdress);
            this.clearErrorsOnFocus();
        },
        methods: {
            ...mapActions(['APPLY_DELIVERY_ADRESS']),
            clearErrorsOnFocus() {
                this.groups.forEach(grp => {
                    let npt = grp.querySelector('input');

                    npt && npt.addEventListener('focus', function () {
                        grp.classList.remove('form_group-error')
                    })
                })
            },
            validateDeliveryService() {
                let area = this.$el.querySelector('[name="deliveryNote"]');
                let errs = [];
                let obj = {};

                if(area.value) {
                    obj.deliveryNote = area.value;
                }

                this.groups.forEach(grp => {
                    let npt = grp.querySelector('input');
                    if(npt) {
                        let name = npt.getAttribute('name')

                        if (npt.value === '') {
                            grp.classList.add('form_group-error');
                            errs.push(name);
                        } else {
                            obj[name] = npt.value;
                        }
                    }
                })

                if(errs.length === 0) {
                    obj.deliveryType = this.deliveryType;

                    this.APPLY_DELIVERY_ADRESS(obj);

                    return true;
                } else {
                    return false;
                }
            },
            syncForms(adr) {
                if(this.deliveryAdress && adr != '') {
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
