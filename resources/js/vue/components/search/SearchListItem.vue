<template>

    <a class="sres_item" v-bind:href="link">
        <div class="sres_col">
            <span class="sres_col_item sres_color" v-bind:class="color"></span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">{{ data.photo }}, id - {{ data.id }}</span>
        </div>
        <div class="sres_col_inner">

            <div class="sres_col_inner_item" v-for="(item, index) in data.cape">
                <span class="sres_col_item">{{ index }}</span>
                <span class="sres_col_item">{{ item }}</span>
            </div>

        </div>
    </a>

</template>

<script>
    export default {
        name: "SearchListItem",
        props: ['data'],
        data: function (){
            return {
                color: '',
                link: ''
            }
        },
        created:function(data) {
            this.link = '/product/' + this.$props.data.id
            let col = this.$props.data.params.color

            switch(col) {
                case 'Черный': this.color = 'blackCol'
                    break;
                case 'Трехцветный': this.color = 'tripleCol'
                    break;
                case 'Голубой': this.color = 'blueCol'
                    break;
                case 'Пурпурный': this.color = 'purpleCol'
                    break;
                case 'Желтый': this.color = 'yellowCol'
                    break;
                default: 'black'
                    break;
            }
        }
    }
</script>

<style scoped>

</style>
