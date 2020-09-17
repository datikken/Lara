<template>
    <div class="checkbox" @click="setChecked">
        <div class="checkbox-wrap">
            <input
                class="checkbox-wrap_input invisible"
                type="checkbox"
                :name="name"
            />
            <img src="/images/icons/arrow_right.svg" alt="icon" class="checkbox-wrap_arrow" v-bind:class="{ invisible: !checked }"/>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SimpleCheckbox",
        props: ['name'],
        data: function() {
            return {
                checked: false
            }
        },
        methods: {
            setChecked() {
                this.checked = !this.checked;
            }
        }
    }
</script>

<style scoped>
    .checkbox-wrap_arrow {
        display: block;
        height: 80%;
        width: 80%;
        transform: rotate(90deg);
        margin-top: 2.5px;
        margin-left: 0;
    }
</style>
