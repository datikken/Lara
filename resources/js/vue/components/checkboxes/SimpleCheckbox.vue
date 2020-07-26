<template>
    <div class="checkbox" @click="setChecked">
        <div class="checkbox-wrap">
            <input
                class="checkbox-wrap_input invisible"
                type="checkbox"
                name="<?php echo $name ?>"
            />
            <img src="/images/icons/arrow_right.svg" alt="icon" class="checkbox-wrap_arrow" v-bind:class="{ invisible: checked }"/>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SimpleCheckbox",
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

</style>
