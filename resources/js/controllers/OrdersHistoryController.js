class OrdersHistoryController {
    _fillItems(obj,id) {
        let dest = document.querySelector('.order_items_container');
        let btnLink = document.querySelector('.history_wrapper-item_row-total-cta');
        let orderLength = document.querySelector('.history_wrapper-item_row-total_content-value');
        let totalPrice = document.querySelector('.order_totalPrice');
        let row = document.querySelectorAll('.order_items');
            row.forEach((el) => el.remove());

            obj.order_items.forEach((el) => {
               let block = `
                    <div class="history_wrapper-item_row order_items">
                        <div class="history_wrapper-item_row-info">
                            <span class="history_wrapper-item_row-item_val">${obj.order[0].id}</span>
                        </div>
                        <div class="history_wrapper-item_row-info">
                            <span class="history_wrapper-item_row-item_val">${el.item_name}</span>
                        </div>
    
                        <div class="history_wrapper-item_row-info">
                            <span class="history_wrapper-item_row-item_val">${el.item_price}</span>
                        </div>
                        <div class="history_wrapper-item_row-info">
                            <span class="history_wrapper-item_row-item_val">${el.quantity}</span>
                        </div>
                    </div>`;

                    dest.insertAdjacentHTML('beforeend', block);
            })

        orderLength.innerText = `${obj.order_items.length} ед.`;
        totalPrice.innerText = `${obj.order[0].price} р.`;
        let val = btnLink.getAttribute('href').split('/repeatOrder');
                  btnLink.setAttribute('href', val[0] + `/repeatOrder/${id}`);
    }
    _makeCall(id) {
        let that = this;
        let dataObj = {
            id,
            token: window.token
        }

        let url = window.getOrderInfo.split('getOrderInfo')[0] + 'getOrderInfo';

        $.ajax({
            method: "post",
            url: url + `/${id}`,
            data: dataObj,
            headers: {'X-CSRF-TOKEN':  window.token},
            success: function (data, status, XHR) {
                that._fillItems(data,id);
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    _setListeners(el) {
        let that = this;
        let orders = el.querySelectorAll('.order_values');

            orders.forEach((el) => {
                el.addEventListener('click', function(e) {
                    let id = parseInt(e.currentTarget.querySelector('.order_id').innerText);

                    orders.forEach((el) => {
                        el.classList.remove('last_order');
                    });

                    e.currentTarget.classList.add('last_order');

                    that._makeCall(id);
                })
            })

    }

    constructor() {
        let block = document.querySelector('.history');
            block && this._setListeners(block);
    }
}

export default OrdersHistoryController;
