import store from './store/adminStore'

class DropDown {
    setListeners(items, url, id, saveYearTrigger, saveYearInput) {

        saveYearTrigger.addEventListener('click', function(e) {
            e.preventDefault();

            store.dispatch('CREATE_YEAR_TO_DESCRIBE', saveYearInput.value)
        });

        items.forEach((btn) => {
            btn.addEventListener('click', function(e) {
              let status = e.target.innerText;
              let obj = {
                  url,
                  status,
                  id
              }

              store.dispatch('CHANGE_ORDER_STATUS', obj);

            })
        })
    }
    constructor(drop) {
        this.store = store;

        let btn = drop.querySelector('[data-toggle="dropdown"]');
        let menu = drop.querySelector('.dropdown-menu');
        let url = btn.getAttribute('data-url');
        let id = btn.getAttribute('data-id');

        let saveYearTrigger = drop.querySelector('[data-saveYearTrigger]');
        let saveYearInput = drop.querySelector('[data-saveYearInput]');

        let btns = menu.querySelectorAll('button');

        this.setListeners(btns, url, id, saveYearTrigger, saveYearInput);
    }
}

export default DropDown;
