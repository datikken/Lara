import $ from 'jquery';

class ProfileController {
    _ajaxInputsSubmit(el) {
       let formGroups = el.querySelectorAll('form');
           formGroups.forEach((el,i) => {
              let btn = el.querySelector('button');
              let dataObj = {};

                  btn.addEventListener('click', function(e) {
                     e.preventDefault();

                     let token = formGroups[i].querySelector('[name="_token"]').value;
                     let url = formGroups[i].getAttribute('action');

                     let a = formGroups[i].querySelector('.input_wrap').querySelector('input');
                     let name = a.getAttribute('name');
                     let val = a.value;

                      dataObj[name] = val;

                      $.ajax({
                          method: "get",
                          url: `${url}`,
                          data: dataObj,
                          token,
                          success: function (status) {
                              alert(status);
                          },
                          error: function (error) {
                              console.warn(error);
                          }
                      });
                  });
           });
    }
    _setListeners(el) {
        let imageWrap = el.querySelector('.dfill_wrap-form_top-left');
            imageWrap.addEventListener('click', function(e) {
                let target = e.currentTarget;
                let input = target.querySelector('.upload_file');
                let form = target.querySelector('form');

                input.click();
                input.addEventListener('change', function() {
                    form.submit();
                });
            });
    }
    constructor() {
        let el = document.querySelector('.dfill');
        if(el) {
            this._setListeners(el);
            this._ajaxInputsSubmit(el);
        }
    }
}

export default ProfileController;
