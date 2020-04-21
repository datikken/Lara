class SearchController {
    setListener(search) {
        $(search).on('focus keypress', function() {
            let val = $(search).val();
            // console.log(val);
        })
    }
    constructor() {
        let el = document.querySelector('.menu_wrapper-item_search_input');
        let search = el.querySelector('input');

        this.setListener(search);
    }
}

export default SearchController;
