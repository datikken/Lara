import $ from 'jquery';
import router from '../vue/router/router';
import MagicButton from '../components/MagicButton'

class CartController {
    constructor(el) {
        let that = this;
        this.el = el;
        let btns = document.querySelectorAll('.ajaxGETproduct');
        let cart = document.querySelector('.cart');
        let magicBtn = document.querySelector('.magic_btn');

        new MagicButton(magicBtn);

        if(cart) {
            this._setDeleteListeners();
            this._setAmountListeners();
        }

        btns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                that.addToCart(e);
            })
        });
    }

    _pushToOrderProcess() {
        router.push('/checkoutProducts');
    }
    _fixCartTotalState() {
        let url = window.location.origin + '/checkCartState';
        let headingAmount = document.querySelector('[data-cartamountval]');
        let headingPrice = document.querySelectorAll('[data-cartpriceval]');

        $.ajax({
            method: "get",
            url: `${url}`,
            success: function (data) {
                headingAmount.innerText = data.totalQuantity;
                headingPrice.forEach((el) => el.innerText = data.totalPrice);
            },
            error: function (error) {
                console.warn(error);
            }
        });
    }
    _changeConcreteItem(a) {
        let cartRows = document.querySelectorAll('.cart_item_row');
            cartRows.forEach((row) => {
                let id = parseInt(row.getAttribute('data-id'));
                    if(a.data.id === id) {
                        let totalCost = row.querySelector('.cart_wrap-item_inner-table_row-col_total');
                        let quantity = row.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
                            quantity.innerText = a.quantity;
                            totalCost.innerText = a.totalPrice;
                    }
            });
    }
    _findItemInCart(data, el) {
        let id = parseInt(el.getAttribute('data-prid'));
        let itemToReturn;
        let objects = data.items;

        for(let item of Object.values(objects)) {
            if(item.data.id === id) {
                itemToReturn = item
            }
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
                            success: function (data) {
                                let changeItemData = that._findItemInCart(data, el);
                                that._changeConcreteItem(changeItemData);
                                that._fixCartTotalState();
                            },
                            error: function (error) {
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
                el.addEventListener('click', function() {
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
            success: function (data) {
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
            error: function (error) {
                console.warn(error);
            }
        });
    }
    _fixDeletion(cart, price, type = 0) {
        $('[data-cartamountval]').html(cart);
        $('[data-cartpriceval]').html(price);

        if(type != 0) {
            $('[data-cartIcon]').attr('src', '/images/menu/empty_cart.svg');
            $('.menu_wrapper-item_cart_currency').addClass('invisible');
        } else {
            $('.menu_wrapper-item_cart_currency').removeClass('invisible');
        }
    }
    addToCart(e, amount = 1) {
        e.preventDefault();
        let that = this;
        let url = e.currentTarget.getAttribute('data-url');
        let executed = false;

        if(!executed) {
            executed = true;

            $.ajax({
                method: "GET",
                url: url,
                data: {
                    token: window.token,
                    amount
                },
                success: function (data) {
                    that._fixDeletion(data.totalQuantity, data.totalPrice);
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        }

    }
}

export default CartController;
