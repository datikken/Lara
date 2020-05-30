class OrdersHistoryController {
    _setListeners() {
        console.warn(block)
    }
    constructor() {
        let block = document.querySelector('.history');
            block && this._setListeners(block);
    }
}

export default OrdersHistoryController;
