class CatalogFiltersController {
    constructor() {
        let filters = document.querySelector('.filters');

        filters && this.activate(filters);
    }

    activate(filters) {
        let items = filters.querySelectorAll('.filters_wrapper-item');

        items.forEach((el,i) => {
            el.addEventListener('click',function (e) {
                let elem = e.currentTarget;

                let list = elem.querySelector('ul');
                let label = elem.querySelector('.filters_wrapper-item_label');
                let arrow = elem.querySelector('img');
                let li = elem.querySelectorAll('.filters_wrapper-item_list-text');

                arrow.classList.toggle('rotate');
                label.classList.toggle('filter-label-visible');
                list.classList.toggle('as-visible');
                items[i].classList.toggle('as-filter-visible');

            })
        });
    }

}

export default CatalogFiltersController;
