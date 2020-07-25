<template>
    <div class="amount_btn">
        <div class="amount_btn-item">
            <img src="/images/icons/alot.svg" alt="amount">
            <span>Много</span>
        </div>
        <div class="amount_btn-value">

            <div class="amount_btn-value-wrap">
                <div class="amount_btn-value-wrap_inner">
                <span class="amount_btn-value-wrap_inner_val">
                   {{ price }}
                </span>
                    <img src="/images/icons/rub.svg" alt="cur" />
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "PriceBtn",
        props: [
            'price'
        ]
    }
</script>

<style scoped>

</style>
