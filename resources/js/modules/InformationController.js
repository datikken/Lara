class InformationController {
    constructor() {
        let info_block = document.querySelector('.info');

        info_block && this._setListeners(info_block);
    }

    _setListeners(block) {
        let blocks = block.querySelectorAll('.info_content-item');

        blocks.forEach((el) => {
            let blockItems = el.querySelectorAll('.info_menu-wrap_item');

            let urik = el.querySelector('.urik_content');
            let fizik = el.querySelector('.fizik_content');

            blockItems.forEach((item) => {

                item.addEventListener('click', function(e) {
                    let target = e.currentTarget;

                    blockItems.forEach((i) => {
                        i.classList.remove('info_active');
                    })

                    target.classList.toggle('info_active');

                    if(target.getAttribute('data-type') == 'fizik') {
                        urik.classList.add('invisible')
                        fizik.classList.remove('invisible')
                    } else {
                        urik.classList.remove('invisible')
                        fizik.classList.add('invisible')
                    }
                });
            });
        });
    }
}

export default InformationController;
