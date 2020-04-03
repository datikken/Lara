
let menuItems = document.querySelectorAll('.menu_wrapper-item-main_menu-item');
let secondary = $('.menu_wrapper-item-main_menu-item-text_secondary');
let menu = document.querySelector('.menu_wrapper-item-main_menu');
let dropdown = document.querySelector('.menu_wrapper-item_menuText');
let array = [document.querySelector('.menu_wrapper-item-main_menu-item-text_secondary'),secondary, menu,dropdown];
let search = document.querySelector('.menu_wrapper-item_search');

// menu_wrapper-item_search search_width



$(document).ready(function() {
    let state = false;

    $(search).on('click', function() {
        if(!state) {
            search.classList.add('search_width');
            state = true;
        } else {
            search.classList.remove('search_width');
            state = false;
        }
    })

    $('.menu_wrapper-item_hamburger').on('click', () => {
            let body = document.querySelector('body');

            if(!state) {
                state = true;

                body.classList.add('overflow')
                document.querySelector('.menu_wrapper-item_secondary').classList.add('as-visible');
                document.querySelector('.menu_wrapper-item_secondary').classList.add('mobile_menu');
            } else {
                state = false;

                body.classList.remove('overflow')
                document.querySelector('.menu_wrapper-item_secondary').classList.remove('as-visible');
                document.querySelector('.menu_wrapper-item_secondary').classList.remove('mobile_menu');
            }
   })
});

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
