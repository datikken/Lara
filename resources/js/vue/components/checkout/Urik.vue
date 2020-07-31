<template>
    <div class="company">
        <div class="company_wrap">
            <div class="company_head">
                <h1 class="company_head_item" data-heading>данные компании</h1>
                <span class="error-message as-none" data-error></span>
            </div>
            <div class="company_inputs">

                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="inn">ИНН <span>*</span></label>
                    <masked-input name="inn" class="company_input" v-model="inn" mask="1111111111"
                                  placeholder="0123456789"/>
                </div>
                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="bik">Бик <span>*</span></label>
                    <masked-input class="company_input" name="bik" v-model="bik" mask="111111111"
                                  placeholder="123456789"/>
                </div>
                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="schet">Расчетный счет <span>*</span></label>
                    <masked-input class="company_input" name="schet" v-model="schet" mask="11111111111111111111"
                                  placeholder="12345678901234567890"/>
                </div>

            </div>

            <div class="company_data">
                <div class="company_header">
                    <span>Проверьте данные о компании</span>
                </div>

                <div class="company_table">
                    <div class="company_table_inner">
                        <div class="company_table_item company_head">
                            <span class="company_head_name">Полное наименование</span>
                            <span class="company_head_value"></span>
                        </div>
                        <div class="company_table_item company_shhead">
                            <span class="company_shhead_name">Сокращенное наименование</span>
                            <span class="company_shhead_value"></span>
                        </div>
                        <div class="company_table_item company_adress">
                            <span class="company_adress_name">Юридический адресс</span>
                            <span class="company_adress_value"></span>
                        </div>
                        <div class="company_table_item company_shadress">
                            <span class="company_shadress_name">Фактический адрес</span>
                            <span class="company_shadress_value"></span>
                        </div>
                        <div class="company_table_item company_postal">
                            <span class="company_postal_name">Почтовый адрес</span>
                            <span class="company_postal_value"></span>
                        </div>
                        <div class="company_table_item company_ogrn">
                            <span class="company_ogrn_name">ОГРН</span>
                            <span class="company_ogrn_value"></span>
                        </div>
                        <div class="company_table_item company_inn">
                            <span class="company_inn_name">ИНН</span>
                            <span class="company_inn_value"></span>
                        </div>
                        <div class="company_table_item company_okpo">
                            <span class="company_okpo_name">ОКПО</span>
                            <span class="company_okpo_value"></span>
                        </div>
                        <div class="company_table_item company_okopf">
                            <span class="company_okopf_name">ОКОПФ</span>
                            <span class="company_okopf_value"></span>
                        </div>
                        <div class="company_table_item company_okvd">
                            <span class="company_okvd_name">ОКВЭД</span>
                            <span class="company_okvd_value"></span>
                        </div>
                    </div>

                    <div class="company_table_inner">
                        <div class="company_table_item company_rss">
                            <span class="company_rss_name">Расчетный счет</span>
                            <span class="company_rss_value"></span>
                        </div>
                        <div class="company_table_item company_bank">
                            <span class="company_bank_name">Банк</span>
                            <span class="company_bank_value"></span>
                        </div>
                    </div>

                    <div class="company_table_inner">
                        <div class="company_table_item company_dir">
                            <span class="company_dir_name">Генеральный директор</span>
                            <span class="company_dir_value"></span>
                        </div>
                        <div class="company_table_item company_dir">
                            <span class="company_dir_name">Главный бугхалтер</span>
                            <span class="company_dir_value"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="urik_btns_wrap">
            <TextBtn text="Продолжить с данными реквизитами" className="proceed_btn animated_btn"
                     @click.native="RSValidation"/>
            <TextBtn text="Добавить другое юридическое лицо" className="proceed_flat_btn"
                     @click.native="rerenderComponent"/>
        </div>


    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import MaskedInput from '../inputs/MaskedInput'
    import {Observable} from "rxjs/Rx"
    import TextBtn from '../btns/TextBtn'
    import router from '../../router/router'

    export default {
        name: "Urik",
        components: {
            MaskedInput,
            TextBtn
        },
        data: () => {
            return {
                userMask: 'aa-aa-AAAA',
                inn: '',
                bik: '',
                schet: '',
            }
        },
        computed: {
            ...mapGetters([
                'urikValidation'
            ])
        },
        methods: {
            ...mapActions([
                'CHANGE_PROGRESS_STEP',
                'SET_URIKS_INFO',
                'VALIDATE_RS'
            ]),
            rerenderComponent() {
                //XXX redo
                location.reload();
            },
            fillFields(obj, block) {
                let name = block.querySelector('.company_head_value');
                let shortName = block.querySelector('.company_shhead_value');
                let adress = block.querySelector('.company_adress_value');
                let dir = block.querySelector('.company_dir_value');
                let okvd = block.querySelector('.company_okvd_value');
                let inn = block.querySelector('.company_inn_value');
                let inn2 = block.querySelector('[name="inn"]');
                let ogrn = block.querySelector('.company_ogrn_value');
                let postal = block.querySelector('.company_postal_value');

                if (obj[0]) {
                    let DATA = obj[0].data

                    name.innerText = DATA.name.full_with_opf ? DATA.name.full_with_opf : '';
                    shortName.innerText = DATA.name.short ? DATA.name.short : '';
                    adress.innerText = DATA.address.unrestricted_value ? DATA.address.unrestricted_value : '';
                    dir.innerText = DATA.management ? DATA.management.name : '';
                    okvd.innerText = DATA.okved ? DATA.okved : '';
                    inn.innerText = DATA.inn ? DATA.inn : '';
                    inn2.value = DATA.inn ? DATA.inn : '';
                    ogrn.innerText = DATA.ogrn ? DATA.ogrn : '';
                    postal.innerText = DATA.address.data.postal_code ? DATA.address.data.postal_code : '';
                }
            },
            setValidation(error) {
                let headingBlock = this.$el.querySelector('.company_head');
                let heading = this.$el.querySelector('[data-heading]');
                let errorBlock = this.$el.querySelector('[data-error]')
                errorBlock.innerText = error.error.message
                errorBlock.classList.remove('as-none')
                heading.classList.add('mb5')
                headingBlock.classList.add('mb30')

                console.warn(error.error.message, 'computed setValidation')
            },
            RSValidation() {
                let bik = this.$el.querySelector('[name="bik"]').value;
                let rs = this.$el.querySelector('[name="schet"]').value;
                let inn = this.$el.querySelector('[name="inn"]').value;

                this.VALIDATE_RS({rs, bik, inn});

                if (this.urikValidation.result === false) {
                    this.setValidation(this.urikValidation);
                } else {
                    this.SET_URIKS_INFO({rs, bik, inn});
                    router.push('/deliveryForm');
                    this.CHANGE_PROGRESS_STEP();
                }
            }
        },
        mounted() {
            let block = document.querySelector('.company');
            let url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/bank';
            let bik = this.$el.querySelector('[name="bik"]');
            let schet = this.$el.querySelector('[name="schet"]');
            let that = this;

            async function postData(url = '', data = {}) {
                const response = await fetch(url, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Authorization': 'Token a799fcceda51c067cdb475e748d7e27e9b4f6fb9',
                        'Content-Type': 'application/json'
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer',
                    body: JSON.stringify(data)
                });

                return await response.json();
            }

            Observable
                .fromEvent(bik, 'keyup')
                .subscribe(() => {
                    postData(url, {"query": `${bik.value}`})
                        .then((data) => {
                            that.fillFields(data.suggestions, block);
                        });
                })
        }
    }
</script>

<style scoped lang="scss">
    .urik_btns_wrap {
        display: flex;
        width: 100%;
        margin-top: 60px;

        .proceed_flat_btn {
            margin-left: 40px;
        }
    }
</style>
