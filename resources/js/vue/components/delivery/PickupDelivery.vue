<template>
    <div>
        <form class="metro_form" method="POST">
            <!--<form class="metro_form" method="POST" action="{{ route('setIssue') }}">-->
            <div class="metro_group">
                <div class="form_group metro_group_wrap">
                    <label for="metro" class="form_group-label">Выбрать ближайшее метро</label>
                    <input type="text" name="metro" value="" class="invisible" />

                    <div class="metro_group_wrap_list-wrap">
                        <span class="metro_group_wrap_list-wrap-heading">Введите ближайшее метро</span>
                        <div class="metro_group_wrap_list-wrap-icon" style="background-image: url('/images/icons/arrow_right.svg')"></div>
                        <ul>
                            <!--@foreach (Config::get('constants.STATIONS') as $station)-->
                            <!--<li>{{ $station }}</li>-->
                            <!--@endforeach-->
                        </ul>
                    </div>
                </div>

                <div class="form_group">
                    <label for="station" class="form_group-label">Выбрать пункт выдачи</label>
                    <input type="text" name="station" style="display: none;">

                    <div class="postamat_list-wrap">
                        <span class="postamat_list-wrap-heading">Введите ближайшее метро</span>
                        <div class="postamat_list-wrap-icon" style="background-image: url('/images/icons/arrow_right.svg')"></div>
                        <ul>
                            <!--@foreach (Config::get('constants.POSTAMATS') as $station)-->
                            <!--<li>{{ $station }}</li>-->
                            <!--@endforeach-->
                        </ul>
                    </div>

                </div>
            </div>

            <TextBtn className="form_group-btn flat_btn" text="Забрать из этого пункта" />

        </form>

        <div class="form_group map_group">
            <div class="map_group-heading">
                <span class="map_group-heading_item">Выбрать на карте</span>
            </div>

            <div id="map" class="ymaps map_group-delivery"></div>
            <TextBtn className="form_group-btn flat_btn" text="Забрать из этого пункта" />
        </div>
    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "PickupDelivery",
        components:{
            TextBtn
        }
    }
</script>

<style scoped>

</style>
