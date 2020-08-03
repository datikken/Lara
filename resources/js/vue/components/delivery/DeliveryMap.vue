<template>
    <div class="form_group map_group" id="self">

        <div class="map_group-heading">
            <span class="map_group-heading_item">Выбрать на карте</span>
        </div>
        <div id="map" style="width: 600px; height: 400px"></div>

        <TextBtn className="form_group-btn flat_btn animated_btn" text="Забрать из этого пункта" @click.native="jumpTopProceed" />
    </div>

</template>

<script>
    import TextBtn from '../btns/TextBtn'
    import {mapActions} from 'vuex'

    export default {
        name: "DeliveryMap",
        components: {
            TextBtn
        },
        data: () => ({ }),
        methods: {
            ...mapActions(['SET_PICKUP_POINT']),
            jumpTopProceed() {
                this.SET_PICKUP_POINT('mainOffice');
                $(document.body).scrollTop($('#proceedToPayments').offset().top);
            },
            initMap() {
                let that = this;

                ymaps.ready(init);
                function init(){
                    var myMap = new ymaps.Map("map", {
                        center: [55.67967429999999, 37.6238394],
                        zoom: 17
                    });
                    myMap.balloon.open([55.67967429999999, 37.6238394], "Мы здесь!", {
                        closeButton: false
                    });
                    myMap.balloon.events.add('click', function () {
                        that.SET_PICKUP_POINT('mainOffice');
                        $(document.body).scrollTop($('#proceedToPayments').offset().top);
                    });
                }
            }
        },
        mounted() {
            this.initMap();
        }
    }
</script>

<style scoped>
    .ymap-container {
        height: 500px;
    }
</style>
