import {fromEvent} from 'rxjs';
import {switchMap} from 'rxjs/operators';
import {Observable} from 'rxjs/Rx';

class SearchController {
    _filterSearchResults(html) {
        console.warn(html)
    }
    _call (url, token, val) {
        $.ajax({
            method: "get",
            url: `${url}`,
            data: {
                searchText: 't2',
                token
            },
            success: function (data, status, XHR) {
                console.log(status)
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    setListener(search) {
        let form = document.querySelector('[data-searchForm]');
        let url = form.getAttribute('action');
        let _token = form.querySelector('[name="_token"]');
        let input = form.querySelector('[name="searchText"]');
        let that = this;

        Observable
            .fromEvent(input, 'keyup')
            .subscribe((e) => {
                $.ajax({
                    method: "get",
                    url: `${url}`,
                    data: {
                        searchText: input.value,
                        token: _token.value
                    },
                    success: function (data, status, XHR) {
                        that._filterSearchResults(data);
                    },
                    error: function (error, status, XHR) {
                        console.warn(error);
                    }
                });
            })

    }
    constructor() {
        let el = document.querySelector('[type="search"]');

        if(el) {
           this.setListener(el);
        }
    }
}

export default SearchController;
