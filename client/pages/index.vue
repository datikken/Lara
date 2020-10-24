<template>
    <div>
        <!--<div class="desktop-hide">-->
            <!--<Swiper />-->
        <!--</div>-->

        <!--<div class="mobile-hide">-->
            <MainSwiper />
        <!--</div>-->
    </div>
</template>
<script>
    import MainSwiper from '../components/swiper/MainSwiper'
    export default {
        layout: 'index',
        components: {
            MainSwiper
        }
    }
</script>
