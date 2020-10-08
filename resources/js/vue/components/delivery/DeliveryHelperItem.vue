<template>
    <div class="delivery_type-item" @click="setDeliveryType" :data-val="name">
        <SimpleCheckbox :name="name" ref="box" />
        <span>{{ text }}</span>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import {mapActions} from 'vuex'

    export default {
        name: "DeliveryHelperItem",
        props: ['text', 'name'],
        data: function() {
            return {
                checked: false
            }
        },
        components: {
            SimpleCheckbox
        },
        methods: {
            ...mapActions([
                'SET_DELIVERY_TYPE'
            ]),
            setDeliveryType(e) {
                let type = document.querySelector('.delivery_type');

                if(type) {
                    let checkboxes = document.querySelectorAll('.checkbox-wrap');
                    checkboxes.forEach((box) => {
                        let img = box.querySelector('img');
                        img && img.classList.add('invisible');
                    })

                    if(!this.checked) {
                        let img = e.currentTarget.querySelector('img')
                        img.classList.remove('invisible');
                    }
                }

                if(!this.checked) {
                    this.SET_DELIVERY_TYPE(e.currentTarget.dataset.val);
                    this.checked = true;
                } else {
                    this.SET_DELIVERY_TYPE('any');
                    this.checked = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
