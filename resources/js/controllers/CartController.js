class CartController {
    constructor(el) {
        let that = this;
        this.el = el;
        let btns = this.el.querySelectorAll('.ajaxGETproduct');

            btns.forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    that._makeCall(e);
                })
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
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        })
    }
}

export default CartController;