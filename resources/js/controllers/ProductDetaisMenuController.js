class ProductDetaisMenuController {
    constructor() {
        let block = document.querySelector('.pdetails_menu');
        block && this._setListeners(block);

    }

    _setListeners(el) {
        let items = el.querySelectorAll('.pdetails_menu_item');
            items.forEach((el) => {
                el.addEventListener('click', (e) => {
                    let item = e.currentTarget;

                    items.forEach((el) => {
                        el.classList.remove('menu_active');
                    });

                    item.classList.add('menu_active');
                })
            })
    }
}

export default ProductDetaisMenuController;
