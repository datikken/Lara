<template>
    <div class="cart_wrap-item_inner-table_row-col_btns-btn-items">
        <a href="#" @click="decrease">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus">-</div>
        </a>
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity" @click="changeQuant" :data-modal-val="quant">
            {{ quant }}
        </div>
        <a href="#" @click="increase">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "AmountBtn",
        props: ['id', 'quantity'],
        data: function (){
            return {
                quant: 1,
            }
        },
        methods: {
            increase(e) {
                e.preventDefault();
                this.changeQuant(1, 'inc')
            },
            decrease(e) {
                e.preventDefault();
                this.changeQuant(1, 'decr')
            },
            changeQuant(value, type) {
                if (type === 'inc') {
                    this.quant = parseInt(this.quant) + parseInt(value);
                } else {
                    if(this.quant != 1) {
                        this.quant = this.quant - value;
                    }
                }
            },
            created() {
                this.quant = parseInt(this.props.quantity);
            }
        }
    }
</script>

<style scoped>

</style>
