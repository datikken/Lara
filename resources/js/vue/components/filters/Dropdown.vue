<template>
    <div class="filters_tip_dropdown as-none" @click="showHideHandler">
        <div class="filters_tip_dropdown_triangle"></div>
        <div class="filters_tip_dropdown_body">
            <span class="filters_tip_dropdown_text">Если вы не знаете какой у вас тип принтера, то можете воспользоваться поиском введя модель принтера или артикул картриджа</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dropdown",
        methods: {
            showHideHandler() {
                this.$el.classList.toggle('as-none');
            }
        }
    }
</script>

<style scoped>

</style>
