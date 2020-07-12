import FastViewController from './FastViewController.js'

class CatalogController {
    _initFastViewController(el) {
       new FastViewController(el);
    }
    _setListeners() {
        let that = this;
        let togglers = document.querySelectorAll('[uk-toggle]');
            togglers.forEach((toggle) => {
                toggle.addEventListener('click', function() {
                    that._initFastViewController(toggle);
                })
            })
    }
    constructor() {
        let catalog = document.querySelector('.products_grid');
            catalog && this._setListeners();
    }
}

export default CatalogController;
