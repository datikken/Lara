class SearchController {
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
    _makeAjax() {
        let form = document.querySelector('[data-searchForm]');
        let url = form.getAttribute('action');
        let token = form.querySelector('[name="_token"]');
        let val = form.querySelector('[name="searchText"]');

        this._call(url, token, val);

    }
    setListener(search) {

        that._makeAjax();

    }
    constructor() {
        let el = document.querySelector('[type="search"]');

        if(el) {
           this.setListener(el);
        }
    }
}

export default SearchController;
