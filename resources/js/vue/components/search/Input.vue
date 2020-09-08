<template>
    <input
        v-on:keyup="serverCall"
        v-model="txtInput"
        type="search"
        name="searchText"
        autocomplete="off"
        placeholder="Введите модель принтера или артикул картриджа"
    />
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "Input",
        created: function() {
            this.initStore();
        },
        data: function() {
            return {
                txtInput: ''
            }
        },
        methods: {
            ...mapActions([
                'SEND_GOOGLE_ANALYTICS'
            ]),
            initStore() {
                this.$store.commit('getAllProducts');
            },
            serverCall: function() {
                let sres = document.querySelector('.sres');
                    sres && sres.classList.remove('as-none');

                this.$store.commit('getFilteredProducts', this.txtInput.toLowerCase());

                let gObj = {
                    category: 'search',
                    eventAction: 'click',
                    eventLabel: 'search',
                    eventValue: this.txtInput
                };

                this.SEND_GOOGLE_ANALYTICS(gObj);
            }
        }
    }
</script>
