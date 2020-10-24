<template>
    <div>
        <Header />
        <Menu />
            <nuxt />
        <Footer />
    </div>
</template>
<script>
    import {mapGetters} from 'vuex';
    import Header from '../components/header/Header';
    import Menu from '../components/menu/Menu';
    import Footer from '../components/footer/Footer'

    export default {
        head: {
            title: 'Recart.me',
            meta: [
                { charset: 'utf-8' },
                { name: 'viewport', content: 'width=device-width, initial-scale=1' },
                {
                    hid: 'description',
                    name: 'description',
                    content: 'Recart.me'
                }
            ]
        },
        components: {
            Header,
            Footer,
            Menu
        },
        computed: {
            ...mapGetters(['user'])
        },
        mounted() {}
    }
</script>
