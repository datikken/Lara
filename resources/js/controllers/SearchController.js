class SearchController {
    setListener(search) {
        $(search).on('focus keypress', function() {
            let val = $(search).val();
            // console.log(val);
        })
    }
    constructor() {
        let el = document.querySelector('.menu_wrapper-item_search_input');
        if(el) {
            let search = el.querySelector('input');
            search && this.setListener(search);
        }
    }
}

export default SearchController;
