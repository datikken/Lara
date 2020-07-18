<template>
    <div class="checkbox">
        <div class="checkbox-wrap">
            <input
                class="checkbox-wrap_input invisible"
                type="checkbox"
                name="<?php echo $name ?>"
            />
            <img src="/images/icons/arrow_right.svg" alt="icon" class="checkbox-wrap_arrow invisible"/>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SimpleCheckbox"
    }
</script>

<style scoped>

</style>
