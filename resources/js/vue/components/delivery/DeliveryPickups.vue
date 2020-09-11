<template>
    <div class="currentPickups">
        <!--<div class="currentPickups_item currentPickups_item-active">-->
        <div class="currentPickups_item" @click="setPickupActive" data-pickup>
            <div class="currentPickups_icon">
                <img src="/images/icons/metro.svg" alt="amount"/>
            </div>
            <div class="currentPickups_metro" data-pickupName>Люблино</div>
            <div class="currentPickups_adr" data-pickupAdress>Совхозная, д. 56, корп 99, стр. 6</div>
            <div class="currentPickups_btn">
                <div class="currentPickups_btn_icon"></div>
            </div>
        </div>
        <div class="currentPickups_item" @click="setPickupActive" data-pickup>
            <div class="currentPickups_icon">
                <img src="/images/icons/metro.svg" alt="amount"/>
            </div>
            <div class="currentPickups_metro" data-pickupName>Нагатинская</div>
            <div class="currentPickups_adr" data-pickupAdress>Варшавское шоссе, 36, стр. 8</div>
            <div class="currentPickups_btn">
                <div class="currentPickups_btn_icon"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "DeliveryPickups",
        methods: {
            ...mapActions([
                'CHECK_DELIVERY_PICKUPS'
            ]),
            setPickupActive(e) {
                let $class = 'currentPickups_item-active';

                let elements = this.$el.querySelectorAll('[data-pickup]');
                    elements.forEach((el) => {
                        el.classList.remove($class);
                    });

                   let target = e.currentTarget;
                       target.classList.toggle($class);

                   let name = target.querySelector('[data-pickupName]').innerText;
                   let adr = target.querySelector('[data-pickupAdress]').innerText;

                   this.CHECK_DELIVERY_PICKUPS({name, adr});
            }
        }
    }
</script>

<style scoped>

</style>
