$(document).ready(function() {
    $('.menu_wrapper-item_hamburger').on('click', () => {
        $('body').toggleClass('overflow');
        $('.menu_wrapper-item_secondary').toggleClass('as-visible');
        $('.menu_wrapper-item_secondary').toggleClass('mobile_menu');
    })
});

let menuItems = document.querySelectorAll('.menu_wrapper-item-main_menu-item');
let secondary = $('.menu_wrapper-item-main_menu-item-text_secondary');
let menu = document.querySelector('.menu_wrapper-item-main_menu');
let dropdown = document.querySelector('.menu_wrapper-item_menuText');

let array = [document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary'),secondary, menu,dropdown];

function _handleChange(item) {
    $(item).mouseover(function() {
        $(menu).css('display', 'block');
    });
    $(item).mouseleave(function() {
        $(menu).css('display', 'none');
    });
}

//main page dropdown
array.forEach((el) => {
    _handleChange(el);
});

//XXX
$(secondary).hover(() => {
    $('.menu_wrapper-item-main_menu-item-text_secondary').add('as-visible');
})
$(menuItems[5]).hover(function() {
    document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary').classList.add('as-visible')
});
$(menuItems[5]).on("mouseleave", function () {
    document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary').classList.remove('as-visible')
})
$('.menu_wrapper-item-main_menu-item-text_secondary').on('mouseenter',function () {
    document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary').classList.add('as-visible')
})
$('.menu_wrapper-item-main_menu-item-text_secondary').on('mouseleave',function () {
    document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary').classList.remove('as-visible')
})
