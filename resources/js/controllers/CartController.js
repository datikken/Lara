class CartController {
    constructor(el) {
        let that = this;
        this.el = el;
        let grid = document.querySelector('.products_grid');
        let btns = document.querySelectorAll('.ajaxGETproduct');

        this._setDeleteListeners();
        this._setAmoundListeners();

        btns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                that._makeCall(e);
            })
        });
    }
    _setAmoundListeners() {
        let block = document.querySelectorAll('.cart_wrap-item_inner-table_row-col_btns-btn-items');

        block.forEach((el) => {
            let links = el.querySelectorAll('a');

            links.forEach((el) => {
                el.addEventListener('click', (e) => {
                    let url = e.currentTarget.getAttribute('href');
                    e.preventDefault();

                    $.ajax({
                        method: "get",
                        url: `${url}`,
                        success: function (data, status, XHR) {
                            console.log(data, status)
                        },
                        error: function (error, status, XHR) {
                            console.warn(error);
                        }
                    });
                })
            })
        })
    }
    _setDeleteListeners() {
        let that = this;
        let closes = document.querySelectorAll('.remove_icon');
            closes && closes.forEach((el,i) => {
                el.addEventListener('click', function(e) {
                    that._deleteFromCart(closes[i],el);
                });
            });
    }

    _deleteFromCart(item) {
        let url = item.getAttribute('data-href');
        let _token = $('input[name="_token"]').val();
        let that = this;

        $.ajax({
            method: "GET",
            url: url,
            data: {token: _token},
            success: function (data, status, XHR) {
                if($(data).hasClass('empty_cart')) {
                    let cart = $('.cart_wrap');
                      $(cart).html(data);

                    that._fixValues('', '', 'addClass');
                } else {
                    let item = $(data).find('.cart_wrap-item_inner-table');
                    let price = item[0].dataset.cartprice;
                    let amount = item[0].dataset.cartamount;

                    let cart = $('.cart_content');
                      $(cart).html($(data)[0]);

                    that._fixValues(amount, price);
                    that._setDeleteListeners();
                }
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    _fixValues(cart, price, type = 0) {
        $('[data-cartAmountVal]').html(cart);
        $('[data-cartPriceVal]').html(price);

        if(type != 0) {
            $('.menu_wrapper-item_cart_currency').addClass('invisible');
        } else {
            $('.menu_wrapper-item_cart_currency').removeClass('invisible');
        }
    }
    _makeCall(e) {
        e.preventDefault();

        let that = this;
        let url = e.currentTarget.getAttribute('data-url');
        let _token = $('input[name="_token"]').val();

        let executed = false;

        if(!executed) {
            executed = true;
            $.ajax({
                method: "GET",
                url: url,
                data: {token: _token},
                success: function (data, status, XHR) {
                    that._fixValues(data.cart, data.price);
                },
                error: function (error, status, XHR) {
                    console.warn(error);
                }
            });
        }

    }
}

export default CartController;
