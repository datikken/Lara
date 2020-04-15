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
                let opn = false;

                let list = elem.querySelector('ul');
                let label = elem.querySelector('.filters_wrapper-item_label');
                let arrow = elem.querySelector('img');
                let lis = elem.querySelectorAll('.filters_wrapper-item_list-text');

                if(!opn) {
                    arrow.classList.toggle('rotate');
                    label.classList.toggle('filter-label-visible');
                    list.classList.toggle('as-visible');
                    items[i].classList.toggle('as-filter-visible');

                    opn = true;
                }

                lis.forEach((item) => {
                    item.addEventListener('click',function (e) {
                        console.log(e.target);
                        opn = false;
                    });
                });

            })
        });
    }

}

export default CatalogFiltersController;
