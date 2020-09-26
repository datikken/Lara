import $ from 'jquery';

class ProfileController {
    _passwordReset(el) {
        let form = el.querySelector('.dchange').querySelector('form');
        let url = form.getAttribute('action');
        let btn = el.querySelector('.dchange_btn');

        btn.addEventListener('click', function() {
            let inputs = form.querySelectorAll('input');
            let dataObj = {};

            inputs.forEach((el) => {
                let name = el.getAttribute('name');
                let val = el.value;

                dataObj[name] = val;
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: 'POST',
                url: `${url}`,
                data: dataObj,
                success: function (status) {
                    // console.log(status);
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        });
    }
    _ajaxInputsSubmit(el) {
       let formGroups = el.querySelectorAll('.one_input_form');
           formGroups.forEach((el,i) => {
              let btn = el.querySelector('button');
                  btn.addEventListener('click', function(e) {
                     e.preventDefault();
                     let method = 'get';
                     let url = formGroups[i].getAttribute('action');
                     let a = formGroups[i].querySelector('.input_wrap').querySelector('input');
                     let name = a.getAttribute('name');
                     let val = a.value;
                     let dataObj = {};
                      dataObj[name] = val;

                      $.ajax({
                          method,
                          url: `${url}`,
                          data: dataObj,
                          success: function (status) {
                              // console.log(status);
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
            this._passwordReset(el);
        }
    }
}

export default ProfileController;
