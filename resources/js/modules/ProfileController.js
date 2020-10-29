import $ from 'jquery';
import Notifications from '../components/Notifications'
import store from '../vue/store/store';

class ProfileController {
    _passwordReset(el) {
        let form = el.querySelector('.dchange').querySelector('form');
        let inputs = form.querySelectorAll('input');
        let url = form.getAttribute('action');
        let btn = el.querySelector('.dchange_btn');

        let notParams = {
            status: 'success',
            pos: 'top-center',
            timeout: 5000
        }

        function clearInputValues() {
            inputs.forEach(npt => {npt.value = ''});
        }

        btn.addEventListener('click', function() {
            let dataObj = {};

            inputs.forEach((el) => {
                let name = el.getAttribute('name');
                let val = el.value;

                dataObj[name] = val;
            })

            $.ajax({
                method: 'POST',
                url: `${url}`,
                data: dataObj,
                success: function (status) {
                    notParams.message = 'Пароль успешно изменен.';
                    notParams.status = 'success';
                    let notification = new Notifications(notParams);

                    notification.show();
                    clearInputValues();
                },
                error: function (error) {
                    notParams.message = 'Что-то пошло не так, попробуйте еще раз.';
                    notParams.status = 'danger';
                    let notification = new Notifications(notParams);

                    notification.show();
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
                     let method = 'post';
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
                              let params = {
                                  message: status.message,
                                  status: 'success',
                                  pos: 'top-center',
                                  timeout: 1000
                              }

                              let notification = new Notifications(params);

                              notification.show();
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
