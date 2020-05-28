import {Observable} from "rxjs/Rx";
import IMask from 'imask';

class DadataController {
    constructor() {
        let block = document.querySelector('.company');

        block && this._setListeners(block);
    }
    _fillFields(obj, block) {
        let name = block.querySelector('.company_head_value');
        let shortName = block.querySelector('.company_shhead_value');
        let adress = block.querySelector('.company_adress_value');
        let dir = block.querySelector('.company_dir_value');
        let okvd = block.querySelector('.company_okvd_value');
        let inn = block.querySelector('.company_inn_value');
        let ogrn = block.querySelector('.company_ogrn_value');
        let postal = block.querySelector('.company_postal_value');

            name.innerText = obj[0].data.name.full_with_opf;
            shortName.innerText = obj[0].data.name.short;
            adress.innerText = obj[0].data.address.unrestricted_value;
            dir.innerText = obj[0].data.management.name;
            okvd.innerText = obj[0].data.okved;
            inn.innerText = obj[0].data.inn;
            ogrn.innerText = obj[0].data.ogrn;
            postal.innerText = obj[0].data.address.data.postal_code;
    }
    _setListeners(block) {
        let url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party'
        let bik = block.querySelector('[name="bik"]');
        let that = this;

        var phoneMask = IMask(
            bik,  {
                mask: /^[0-9]\d{0,9}$/
            });

        async function postData(url = '', data = {}) {
            const response = await fetch(url, {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Authorization':'Token a799fcceda51c067cdb475e748d7e27e9b4f6fb9',
                    'Content-Type':'application/json'
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify(data)
            });

            return await response.json();
        }

        Observable
            .fromEvent(bik, 'keyup')
            .subscribe((e) => {
                // if(bik.value.length === 10)
                postData(url, {"query":`${bik.value}`})
                    .then((data) => {
                        that._fillFields(data.suggestions,block);
                    });
            })

    }
}

export default DadataController;
