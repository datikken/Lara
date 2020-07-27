<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item">
            <div class="step_wrap">

                <div class="form_group">
                    <span class="form_group-heading">Введите город, улицу и номер дома.</span>
                </div>

                <div class="index_group getSetAddress">
                    <div class="form_group">
                        <label for="city" class="form_group-label">Город</label>
                        <input type="text" name="city"/>
                    </div>

                    <div class="form_group">
                        <label for="street" class="form_group-label">Улица</label>
                        <input type="text" name="street"/>
                    </div>

                    <div class="form_group inline_group">
                        <div class="label_wrap">
                            <label for="house" class="form_group-label">Дом</label>
                            <input type="text" name="house"/>
                        </div>

                        <div class="label_wrap">
                            <label for="body" class="form_group-label">Корпус</label>
                            <input type="text" name="body"/>
                        </div>

                        <div class="label_wrap">
                            <label for="building" class="form_group-label">Строение</label>
                            <input type="text" name="building"/>
                        </div>
                    </div>

                    <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" />

                    <!--<button type="submit" class="setAddressSubmit">-->
                    <!--&lt;!&ndash;<button type="submit" class="setAddressSubmit" data-url="{{ route('setAddress') }}">&ndash;&gt;-->
                    <!--&lt;!&ndash;@include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn animated_btn', 'text' => 'применить'])&ndash;&gt;-->
                    <!--</button>-->
                </div>

                <form class="index_group" method="POST">
                    <!--<form action="{{ route('setIndex') }}" class="index_group" method="POST">-->
                    <div class="index_heading">
                        <span class="index_heading-item">Или почтовый индекс</span>
                    </div>

                    <div class="form_group">
                        <label for="index" class="form_group-label">Индекс</label>
                        <div class="form_group-wrap">
                            <input type="text" name="index"/>

                            <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" />
                        </div>
                    </div>
                </form>

                <SelfDelivery v-if="this.deliveryType === 'self' "/>

            </div>
        </div>
    </div>
</template>

<script>
    import SelfDelivery from './SelfDelivery'
    import TextBtn from '../btns/TextBtn'
    import { mapGetters } from 'vuex'

    export default {
        name: "DeliveryForms",
        components: {
            SelfDelivery,
            TextBtn
        },
        computed: {
            ...mapGetters([
                'deliveryType'
            ])
        }
    }
</script>

<style scoped>

</style>
