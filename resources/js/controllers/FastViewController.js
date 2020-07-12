import $ from "jquery";

class FastViewController {
    _getProductJson(el) {
        let pid = el.querySelector('[data-prid]').dataset.prid;
        let url = window.location.host + `/product/${pid}`;

        $.ajax({
            method: "get",
            url: `${url}`,
            data: {
                id: pid
            },
            success: function (data) {
                console.warn(data);
            },
            error: function (error) {
                console.warn(error);
            }
        });


    }
    _addToCartProcessor(el) {
        let btn = el.querySelector('.prdet_wrap-icons_ctas-buy');
            btn.addEventListener('click', function() {
                let amount = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity').innerText;
                let url = btn.dataset.url;
                let pid = el.querySelector('[data-prid]').dataset.prid;

                $.ajax({
                    method: "get",
                    url: `${url}`,
                    data: {
                        id: pid,
                        amount
                    },
                    success: function (data) {
                        let amount = data.totalQuantity;
                        let price = data.totalPrice;

                        $('.menu_wrapper-item_cart_icon-amount').text(amount);
                        $('[data-cartpriceval]').text(price);
                    },
                    error: function (error) {
                        console.warn(error);
                    }
                });


            })
    }
    _amountProcessor(el) {
        let btns = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items');
        let links = btns.querySelectorAll('a');
        let amountBlock = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');

            function fixAmount(url) {
                let amountValue = parseInt(amountBlock.innerText);

                if(url.indexOf('increase') >= 0) {
                    amountValue = amountValue + 1;
                } else {
                    if(amountValue > 1) {
                        amountValue = amountValue - 1;
                    } else {
                        return
                    }
                }

                amountBlock.innerText = amountValue;
            }

            links.forEach((a) => {
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    let url = a.getAttribute('href');

                    fixAmount(url)
                })
            })
    }
    constructor(el) {
        let id = el.getAttribute('href').replace('#','');
        let modal = document.querySelector(`#${id}`);

        if(modal) {
            this._amountProcessor(modal);
            this._addToCartProcessor(modal);
            this._getProductJson(modal);
        }
    }
}

export default FastViewController;
