<template>
    <input
        v-on:keyup="serverCall"
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
        methods: {
            initStore() {
                this.$store.commit('getAllProducts');
            },
            serverCall: function() {
                console.log(this.$store.state.products);
            }
        }
    }
</script>
