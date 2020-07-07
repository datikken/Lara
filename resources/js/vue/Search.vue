<template>
    <div>
        <Input />
        <SearchList />
    </div>
</template>

<script>
    import Input from './components/Input';
    import SearchList from './components/SearchList';
    import SearchListItem from './components/SearchListItem';

    export default {
        name: 'app',
        components: {
            Input,
            SearchList,
            SearchListItem
        }
    }
</script>
