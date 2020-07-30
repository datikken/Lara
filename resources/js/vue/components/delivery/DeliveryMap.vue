<template>
    <div class="form_group map_group">

        <div class="map_group-heading">
            <span class="map_group-heading_item">Выбрать на карте</span>
        </div>
        <div id="map" style="width: 600px; height: 400px"></div>

        <TextBtn className="form_group-btn flat_btn" text="Забрать из этого пункта"/>
    </div>

</template>

<script>
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "DeliveryMap",
        components: {
            TextBtn
        },
        data: () => ({ }),
        methods: {
            initMap() {
                ymaps.ready(init);
                function init(){
                    var myMap = new ymaps.Map("map", {
                        center: [55.76, 37.64],
                        zoom: 17
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
