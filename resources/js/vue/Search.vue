<template>
    <div>
        <Input />
        <SearchList />
    </div>
</template>

<script>
    import Input from './components/search/Input';
    import SearchList from './components/search/SearchList';
    import SearchListItem from './components/search/SearchListItem';

    export default {
        name: 'app',
        components: {
            Input,
            SearchList,
            SearchListItem
        }
    }
</script>
