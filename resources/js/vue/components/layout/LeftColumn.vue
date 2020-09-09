<template>

    <div class="left_column">
        <Filters />
        <Viewed />
    </div>

</template>

<script>
    import ResizeObserver from '../../../../js/functions/ResizeObserver';
    import utils from '../../../../js/functions/utils';
    import Filters from '../filters/Filters';
    import Viewed from '../viewed/Viewed';

    export default {
        name: "LeftColumn",
        components: {
            Filters,
            Viewed
        }
    }
</script>

<style scoped>

</style>
