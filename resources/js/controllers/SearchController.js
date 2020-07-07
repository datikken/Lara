/* eslint-disable */
import { fromEvent } from 'rxjs';
import {Observable} from 'rxjs/Rx';
import $ from 'jquery';

class SearchController {
    _filterSearchResults(html) {
        let sres = document.querySelector('.sres');
            sres.innerHTML = html;

        sres.classList.remove('as-none');

        console.warn(html);
    }
    setListener(search) {
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
                        that._filterSearchResults(data);
                    },
                    error: function (error) {
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
