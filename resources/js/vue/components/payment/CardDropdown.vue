<template>

    <div class="payment_wrap-form_group-date">
        <div class="year">
            <span class="year_label">{{ name }}</span>
            <span class="arrow" style="background-image: url('/images/icons/arrow_right.svg')"></span>

            <ul class="invisible">
                <li v-for="year in this.years">{{ year }}</li>
            </ul>

        </div>
    </div>

</template>

<script>
    export default {
        name: "CardDropdown",
        props: ['name'],
        data: () => ({
            years: ['2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020']
        })
    }
</script>

<style scoped>

</style>
