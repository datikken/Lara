import store from '../store/adminStore'

class DropDown {
    changeAdminStatus(drop) {
        let btns = drop.querySelectorAll('.dropdown-item');

        btns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                let status = e.currentTarget.dataset.status;

                store.dispatch('CHANGE_USER_STATUS', status);
            })
        })
    }

    setListeners(items, url, id, saveYearTrigger, saveYearInput) {

        saveYearTrigger && saveYearTrigger.addEventListener('click', function(e) {
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

        let setAdmin = drop.dataset;

        let saveYearTrigger = drop.querySelector('[data-saveYearTrigger]');
        let saveYearInput = drop.querySelector('[data-saveYearInput]');

        let btns = menu.querySelectorAll('button');

        if(setAdmin) {
            this.changeAdminStatus(drop)
        } else {
            this.setListeners(btns, url, id, saveYearTrigger, saveYearInput);
        }
    }
}

export default DropDown;
