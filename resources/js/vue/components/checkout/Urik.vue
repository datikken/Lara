<template>
    <div class="company">
        <div class="company_wrap">
            <div class="company_head">
                <h1 class="company_head_item">данные компании</h1>
            </div>
            <div class="company_inputs">
                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="inn">ИНН <span>*</span></label>
                    <input class="company_input" type="text" name="inn" placeholder="12345678910">
                </div>
                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="bik">Бик <span>*</span></label>
                    <input class="company_input" type="text" name="bik" placeholder="123456789">
                </div>
                <div class="company_inputs_items">
                    <label class="company_inputs_items_label" for="schet">Расчетный счет <span>*</span></label>
                    <input class="company_input" type="text" name="schet" placeholder="12345678901234567890">
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
                        <div class="company_table_item company_bik">
                            <span class="company_bik_name">Бик</span>
                            <span class="company_bik_value"></span>
                        </div>
                        <div class="company_table_item company_kss">
                            <span class="company_kss_name">Бик</span>
                            <span class="company_kss_value"></span>
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
    </div>
</template>

<script>
    export default {
        name: "Urik"
    }
</script>

<style scoped>

</style>
