<template>
    <a class="sres_item" v-bind:href="link" @mouseover="backgroundOnHover" @mouseleave="clearBackgroundOnHover">
        <div class="sres_col">
            <span class="sres_col_item sres_color" v-bind:class="color"></span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">{{ data.artikul }}</span>
        </div>
        <div class="sres_col_inner">

            <div class="sres_col_inner_item" v-for="(item, index) in this.cape" :key=item>
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
                link: '',
                cape: ''
            }
        },
        created:function(data) {
            this.link = '/product/' + this.$props.data.id
            this.cape = this.$props.data.cape;
            let col = JSON.parse(this.$props.data.params).color;

            switch(col) {
                case undefined: this.color = 'blackCol'
                    break;
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
                default: 'blackCol'
                    break;
            }
        },
        methods: {
            backgroundOnHover() {
                if(this.color) {
                    this.$el.classList.add(this.color);
                    this.$el.style.color = '#fff';

                    if(this.color === 'tripleCol') {
                        this.color = 'tripleCol';
                        this.$el.style.color = 'black';
                    }
                }
            },
            clearBackgroundOnHover() {
                this.color && this.$el.classList.remove(this.color);
                this.$el.style.color = 'unset';
            }
        }
    }
</script>

<style scoped>

</style>
