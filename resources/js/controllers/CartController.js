class CartController {
    constructor(el) {
        let that = this;
        this.el = el;
        let btns = this.el.querySelectorAll('.ajaxGETproduct');
        let closes = this.el.querySelectorAll('.remove_icon');

        closes && closes.forEach((el,i) => {
            el.addEventListener('click', function(e) {
                    that._deleteFromCart(closes[i],el);
                });
        });

       btns && btns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                that._makeCall(e);
            })
        });
    }

    _deleteFromCart(item) {
        let url = item.getAttribute('data-href');
        let _token = $('input[name="_token"]').val();

        $.ajax({
            method: "GET",
            url: url,
            data: {token: _token},
            success: function (data, status, XHR) {
               console.log(data);
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    _makeCall(e) {
        e.preventDefault();

        let url = e.currentTarget.getAttribute('data-url');
        let _token = $('input[name="_token"]').val();

        $.ajax({
            method: "GET",
            url: url,
            data: {token: _token},
            success: function (data, status, XHR) {
                $('#cartAmount').html(data.cart);
                $('#cartPrice').html(data.price);
                $('.menu_wrapper-item_cart_currency ').removeClass('invisible');

                console.log(data);
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
}

export default CartController;