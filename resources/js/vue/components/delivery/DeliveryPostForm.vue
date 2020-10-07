<template>
    <div class="postDelForm">
        <div class="postDelForm_inner">

            <div class="postDelForm_item">
                <div class="form_group">
                    <label class="form_group_label" for="city">Город</label>
                    <input class="form_group_input" type="text" name="city" placeholder="выберите город" data-required/>
                    <label class="form_group_message" for="required">Поле город обязательно к заполнению</label>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="index">Индекс</label>
                    <input class="form_group_input" type="text" name="index" placeholder="введите индекс"
                           data-required/>
                    <label class="form_group_message" for="required">Поле индекс обязательно к заполнению</label>
                </div>
            </div>
            <div class="postDelForm_item">
                <div class="form_group">
                    <label class="form_group_label" for="street">Улица</label>
                    <input class="form_group_input" type="text" name="street" data-required
                           placeholder="введите улицу"/>
                    <label class="form_group_message" for="required">Поле улица обязательно к заполнению</label>
                </div>
            </div>
            <div class="postDelForm_item postDelForm_item-four">
                <div class="form_group">
                    <label class="form_group_label" for="home">Дом</label>
                    <input class="form_group_input" type="text" pattern="[0-9]" name="house" placeholder="номер"
                           data-required/>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="wing">Корпус</label>
                    <input class="form_group_input" type="text" pattern="[0-9]" name="body" placeholder="номер"
                           data-required/>
                </div>
                <div class="form_group">
                    <label class="form_group_label" for="building">Строение</label>
                    <input class="form_group_input" type="text" pattern="[0-9]" name="building" placeholder="номер"
                           data-required/>
                </div>
                <div class="form_group">
                    <label class="form_group_label as-flex gap5" for="flat">Квартира/офис <span
                        class="required">*</span></label>
                    <input class="form_group_input" type="text" pattern="[0-9]" name="flat" placeholder="номер"
                           data-required/>
                </div>
            </div>

            <div class="form_group">
                <span class="form_group_tip as-flex gap5"><span class="required">*</span> если у вас частный дом, то в поле квартира введите цифру 1</span>
            </div>

        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "DeliveryPostForm",
        data: function () {
            return {
                groups: [],
            }
        },
        components: {
            TextBtn
        },
        computed: {
            ...mapGetters([
                'deliveryAdress',
                'lastDeliveryAdress'
            ])
        },
        watch: {
            lastDeliveryAdress(nval, oval) {
                console.log('lastDeliveryAdress watch',nval)
            },
            deliveryAdress(nval, oval) {
                console.log('deliveryAdress',nval)
            }
        },
        mounted() {
            this.groups = this.$el.querySelectorAll('.form_group');
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
            handleValidatePostForm() {
                let errs = [];
                let obj = {};

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
                    obj.deliveryType = 'post';

                    this.APPLY_DELIVERY_ADRESS(obj);

                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>
