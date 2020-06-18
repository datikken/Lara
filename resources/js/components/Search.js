import $ from 'jquery';

$(document).ready(function() {
    $('.menu_wrapper-item_search_button').on('click', () => {
        $('.menu_wrapper-item_search').toggleClass('search_width');
    })
});
