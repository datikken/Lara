<template>
    <div>
        <form class="index_group" method="POST">
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

</template>

<script>
    import {mapGetters} from 'vuex'
    import SelfDelivery from './SelfDelivery'
    import TextBtn from '../btns/TextBtn';

    export default {
        name: "DeliveryIndex",
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
