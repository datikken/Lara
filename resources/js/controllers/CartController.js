class CartController {
    constructor(el) {
        let that = this;
        this.el = el;
        let grid = document.querySelector('.products_grid');
        let btns = document.querySelectorAll('.ajaxGETproduct');

        this._setDeleteListeners();
        this._setAmountListeners();

        btns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                that._makeCall(e);
            })
        });
    }

    _changeConcreteItem(a) {
        console.warn('_changeConcreteItem', a);
    }
    _findItemInCart(data, el) {
        let id = parseInt(el.getAttribute('data-prid'));
        let itemToReturn;
        let objects = data.items;

        for(let item of Object.values(objects)) {
            if(item.data.id === id) {
                itemToReturn = item
            }

            id = item.data.id;
        }

        return itemToReturn;
    }

    _setAmountListeners() {
        let that = this;
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
                                let changeItemData = that._findItemInCart(data, el);

                                that._changeConcreteItem(changeItemData);
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

                    that._fixDeletion('', '', 'addClass');
                } else {
                    let item = $(data).find('.cart_wrap-item_inner-table');
                    let price = item[0].dataset.cartprice;
                    let amount = item[0].dataset.cartamount;

                    let cart = $('.cart_content');
                      $(cart).html($(data)[0]);

                    that._fixDeletion(amount, price);
                    that._setDeleteListeners();
                }
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    _fixDeletion(cart, price, type = 0) {
        $('[data-cartAmountVal]').html(cart);
        $('[data-cartPriceVal]').html(price);

        if(type != 0) {
            $('.menu_wrapper-item_cart_currency').addClass('invisible');
        } else {
            $('.menu_wrapper-item_cart_currency').removeClass('invisible');
        }
    }
    _makeCall(e, amount = 1) {
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
                data: {
                    token: _token,
                    amount
                },
                success: function (data, status, XHR) {
                    that._fixDeletion(data.cart, data.price);
                },
                error: function (error, status, XHR) {
                    console.warn(error);
                }
            });
        }

    }
}

export default CartController;
