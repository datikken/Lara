<template>
    <div class="vue_loader">
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
</template>

<script>
    export default {
        name: "Loader",
        methods: {
            created() {

            }
        }
    }
</script>

<style scoped lang="scss">
    .vue_loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,100%);

        @media screen and (min-width: 1000px) {
            transform: translate(-50%,-50%);
        }
    }
    .lds-ring {
        display: inline-block;
        position: relative;
        width: 36px;
        height: 36px;
        margin: 0 auto;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 24px;
        height: 24px;
        margin: 4px;
        border: 4px solid #292930;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #292930 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
