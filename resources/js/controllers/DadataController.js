import {Observable} from "rxjs/Rx";
import IMask from 'imask';

class DadataController {
    constructor() {
        let block = document.querySelector('.company');

        block && this._setListeners(block);
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
                if(bik.value.length === 10)
                postData(url, {"query":`${bik.value}`})
                    .then((data) => {
                        console.log(data);
                    });
            })

    }
}

export default DadataController;
