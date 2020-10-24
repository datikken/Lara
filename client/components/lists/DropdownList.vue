<template>
    <div class="form_group metro_group_wrap" @click="listsHandler">
        <label for="metro" class="form_group-label">{{ heading }}</label>
        <input type="text" name="metro" value="" class="invisible"/>

        <div class="metro_group_wrap_list-wrap">
            <span class="metro_group_wrap_list-wrap-heading" data-dest>{{ placeholder }}</span>
            <div class="metro_group_wrap_list-wrap-icon"
                 style="background-image: url('/images/icons/arrow_right.svg')"
                 data-arrow
            ></div>
            <ul>
                <li v-for="station in data" @click="handlePick">{{ station }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MetroList",
        props: ['data','heading','placeholder'],
        methods: {
            handlePick(e) {
                let text = e.currentTarget.innerText;
                let head = this.$el.querySelector('[data-dest]');
                head.innerText = text;
            },
            listsHandler() {
                let arrow = this.$el.querySelector('[data-arrow]');
                let ul = this.$el.querySelector('ul');
                ul.classList.toggle('active_ul');
                arrow.classList.toggle('arrow_rotate');
            },
        }
    }
</script>

<style scoped>

</style>
