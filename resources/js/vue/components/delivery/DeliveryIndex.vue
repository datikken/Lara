<template>
    <div>
        <form class="index_group" method="POST">
            <div class="index_heading">
                <span class="index_heading-item">Или почтовый индекс</span>
            </div>

            <div class="form_group">
                <label for="index" class="form_group-label">Индекс</label>
                <div class="form_group-wrap index_field">
                    <input type="text" name="index" data-index_field/>

                    <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" @click.native="setDelivery" />
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
        methods: {
            ...mapActions(['SET_DELIVERY_INDEX']),
            setDelivery() {
                let npt = this.$el.querySelector('[data-index_field]')
                let obj = {
                    index: npt.value
                }

                this.SET_DELIVERY_INDEX(obj);
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

</style>
