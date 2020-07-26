<template>
    <div class="delivery_type-item" @click="setDeliveryType">
        <SimpleCheckbox :name="name" ref="child" />
        <span>{{ text }}</span>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import {mapActions} from 'vuex'

    export default {
        name: "DeliveryHelperItem",
        props: ['text', 'name'],
        components: {
            SimpleCheckbox
        },
        methods: {
            ...mapActions([
                'SET_DELIVERY_TYPE'
            ]),
            setDeliveryType() {
                let type = document.querySelector('.delivery_type');

                if(type) {
                    let checkboxes = document.querySelectorAll('.checkbox-wrap');
                        checkboxes.forEach((box) => {
                            let img = box.querySelector('img');
                                img && img.classList.add('invisible');
                        })
                }

                // this.$refs.child.setChecked();

                this.SET_DELIVERY_TYPE(this.$props.name);
            }
        }
    }
</script>

<style scoped>

</style>
