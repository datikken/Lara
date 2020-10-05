<template>
    <div data-deliveryIndexBlock class="delivery_index_block">
        <form class="index_group" method="POST">
            <div class="index_heading">
                <span class="index_heading-item">Или почтовый индекс</span>
            </div>

            <div class="form_group getSetIndex">
                <label for="index" class="form_group-label">Индекс</label>
                <div class="form_group-wrap index_field">
                    <input type="text" name="index" data-index_field/>

                    <TextBtn
                        className="form_group-btn magic_btn"
                        text="применить"
                        @click.native="setDeliveryIndex"
                        id="indexBtn"
                    />
                </div>
            </div>
        </form>

        <SelfDelivery v-if="this.deliveryType === 'self' "/>

    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import SelfDelivery from './SelfDelivery'
    import TextBtn from '../btns/TextBtn';

    export default {
        name: "DeliveryIndex",
        components: {
            SelfDelivery,
            TextBtn
        },
        mounted() {
            this.CREATE_MAGIC_BTN(this.$el.querySelector('#indexBtn'));
        },
        methods: {
            ...mapActions([
                'SET_DELIVERY_INDEX',
                'SHOW_DELIVERY_TYPE_HELPER',
                'BLOCK_FORM_INPUTS',
                'CREATE_MAGIC_BTN'
            ]),
            setDeliveryIndex() {
                let firstForm = document.querySelector('.first_step_form');
                let npt = this.$el.querySelector('[data-index_field]');
                let obj = {
                    index: npt.value
                }

                this.SET_DELIVERY_INDEX(obj);

                npt.value = '';
                npt.setAttribute('disabled', 'true');

                this.BLOCK_FORM_INPUTS(firstForm);
            }
        },
        computed: {
            ...mapGetters([
                'deliveryType'
            ])
        }
    }
</script>

<style scoped>
    .delivery_index_block {
        margin-bottom: 60px;
    }
</style>
