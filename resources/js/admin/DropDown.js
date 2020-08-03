import store from './store/adminStore'

class DropDown {
    setListeners(items, url, id) {

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
        let btn = drop.querySelector('[data-toggle="dropdown"]');
        let menu = drop.querySelector('.dropdown-menu');
        let url = btn.getAttribute('data-url');
        let id = btn.getAttribute('data-id');
        this.store = store;

        let btns = menu.querySelectorAll('button');

        this.setListeners(btns, url, id);
    }
}

export default DropDown;
