<template>

    <div class="payment_wrap-form_group-date" @click="toggleDropdown">
        <div class="year">
            <span class="year_label" :data-name="name">{{ name }}</span>
            <span class="arrow" style="background-image: url('/images/icons/arrow_right.svg')"></span>

            <ul class="invisible payment_dropdown">
                <li v-for="type in data">{{ type }}</li>
            </ul>

        </div>
    </div>

</template>

<script>
    export default {
        name: "CardDropdown",
        props: ['data','name'],
        data: () => ({
            opened: false,
            greenLight: false
        }),
        watch: {
            opened(newVal, oldVal) {
               this.greenLight = newVal;
            }
        },
        methods: {
            toggleDropdown(e) {
                let $class;
                let ul = this.$el.querySelector('ul');

                if(e.currentTarget.querySelector('[data-name]').getAttribute('data-name') === 'Год') {
                    $class = 'payment_dropdown_open';
                } else {
                    $class = 'payment_dropdown_open-right'
                }

                ul.classList.toggle($class);

                if(this.greenLight) {
                    this.$el.querySelector('[data-name]').innerText = e.target.innerText;
                }

                this.opened = !this.opened;
            }
        }
    }
</script>

<style scoped>

</style>
