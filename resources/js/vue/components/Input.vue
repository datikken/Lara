<template>
    <input
        type="search"
        name="searchText"
        placeholder="Введите модель принтера или артикул картриджа"
    />
</template>

<script>
    import {Observable} from 'rxjs/Rx';
    import $ from 'jquery';

    export default {
        name: "Input",
        methods: {
            serverCall: function() {
                let form = document.querySelector('[data-searchForm]');
                let url = form.getAttribute('action');
                let _token = form.querySelector('[name="_token"]');
                let input = form.querySelector('[name="searchText"]');
                let that = this;

                Observable
                    .fromEvent(input, 'keyup')
                    .subscribe(() => {
                        $.ajax({
                            method: "get",
                            url: `${url}`,
                            data: {
                                searchText: input.value,
                                token: _token.value
                            },
                            success: function (data) {
                                console.log(data);
                            },
                            error: function (error) {
                                console.warn(error);
                            }
                        });
                    })
            }
        }
    }
</script>
