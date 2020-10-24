<template>
    <swiper
        :slides-per-view="3"
        :space-between="50"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
    >
        <swiper-slide>Slide 1</swiper-slide>
        <swiper-slide>Slide 2</swiper-slide>
        <swiper-slide>Slide 3</swiper-slide>
    </swiper>
    <!--<div class="swiper-container main_slider">-->
    <!--<div class="swiper-wrapper">-->
    <!---->
    <!---->
    <!--&lt;!&ndash;@foreach($slides as $slide)&ndash;&gt;-->
    <!--<div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1504276048855-f3d60e69632f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60')"></div>-->
    <!--<div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1504276048855-f3d60e69632f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60')"></div>-->
    <!--<div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1504276048855-f3d60e69632f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60')"></div>-->
    <!--&lt;!&ndash;@endforeach&ndash;&gt;-->
    <!--</div>-->
    <!--<div class="swiper-pagination main_slider_pagination"></div>-->

    <!--<div class="swiper-button-prev main_slider-nav"></div>-->
    <!--<div class="swiper-button-next main_slider-nav"></div>-->
    <!--</div>-->
</template>

<script>
    import {mapActions} from 'vuex';
    import {Swiper, SwiperSlide} from 'swiper';

    export default {
        name: "MainSwiper",
        methods: {
            ...mapActions(['']),
            initMainSwiper() {
                console.warn('swiper')
            },
            onSwiper(swiper) {
                console.log(swiper)
            },
            onSlideChange() {
                console.log('slide change')
            },
        },
        components: {
            Swiper,
            SwiperSlide,
        },
        mounted() {
            this.initMainSwiper();
        }
    }
</script>

<style scoped>

</style>
