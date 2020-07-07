<template>
    <input
        v-on:keyup="serverCall"
        v-model="txtInput"
        type="search"
        name="searchText"
        placeholder="Введите модель принтера или артикул картриджа"
    />
</template>

<script>
    export default {
        name: "Input",
        created: function() {
            this.initStore();
        },
        data: function (){
            return {
                txtInput: ''
            }
        },
        methods: {
            initStore() {
                this.$store.commit('getAllProducts');
            },
            serverCall: function() {
                this.$store.commit('getFilteredProducts', this.txtInput);
            }
        }
    }
</script>
