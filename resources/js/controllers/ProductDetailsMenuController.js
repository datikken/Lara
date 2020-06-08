class ProductDetailsMenuController {
    constructor() {
        let container = document.querySelector('.page_content');
        let block = document.querySelector('.pdetails_menu');
            block && this._setListeners(block, container);

        this.prcp = container.querySelector('.prcp');
        this.prdch = container.querySelector('.prdch');
        this.prdesc = container.querySelector('.prdesc');
        this.pfeedback = container.querySelector('.pfeedback');
    }
    _setListeners(el, block) {
        let that = this;
        let items = el.querySelectorAll('.pdetails_menu_item');

            items.forEach((el) => {
                el.addEventListener('click', (e) => {
                    let item = e.currentTarget;
                    let id = parseInt(item.getAttribute('data-id'));

                    items.forEach((el) => {
                        el.classList.remove('menu_active');
                    });

                    item.classList.add('menu_active');
                    that._showHideElements(id, block);
                })
            })
    }
    _showHideElements(id, block) {
        let items = [
            this.prcp,
            this.prdch,
            this.prdesc,
            this.pfeedback
        ];

        items.forEach((el, i) => {
            el.classList.add('as-none');

            if(i === id) {
                el.classList.remove('as-none');
            }
        })
    }
}

export default ProductDetailsMenuController;
