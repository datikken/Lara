class CartController {
    constructor(el) {
        this.el = el;
        let that = this;

        let btn = this.el.querySelector('.ajaxGETproduct');
            btn.addEventListener('click', function(e) {
                that._makeCall(e);
            })
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
                // console.warn(data);
            },
            error: function (error, status, XHR) {
                // console.warn(error);
            }
        })
    }
}

export default CartController;