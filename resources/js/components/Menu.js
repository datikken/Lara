$(document).ready(function() {
    $('.menu_wrapper-item_hamburger').on('click', () => {
        $('body').toggleClass('overflow');
        $('.menu_wrapper-item_secondary').toggleClass('as-visible');
        $('.menu_wrapper-item_secondary').toggleClass('mobile_menu');
    })
});