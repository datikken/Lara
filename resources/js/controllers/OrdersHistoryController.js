class OrdersHistoryController {
    _setListeners() {

    }

    constructor() {
        let block = document.querySelector('.history');
            block && this._setListeners(block);
    }
}

export default OrdersHistoryController;
