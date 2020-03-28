$(document).ready(function() {
    $('.menu_wrapper-item_hamburger').on('click', () => {
        $('body').toggleClass('overflow');
        $('.menu_wrapper-item_secondary').toggleClass('as-visible');
        $('.menu_wrapper-item_secondary').toggleClass('mobile_menu');
    })
});

let menuItems = document.querySelectorAll('.menu_wrapper-item-main_menu-item');
let secondary = '.menu_wrapper-item-main_menu-item-text_secondary';

let array = [menuItems[5], secondary];

array.forEach((el) => {
    $(el).mouseover(function() {
        $(secondary).css('display', 'block');
    });
    $(el).mouseleave(function() {
        $(secondary).css('display', 'none');
    });
});
