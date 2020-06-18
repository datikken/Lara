/* eslint-disable */
import $ from 'jquery';

class TrackingFeedController {
    _makeCall(el,theme) {
        let message = el.querySelector('textarea').value;
        let url = el.querySelector('.trackfeed_content').getAttribute('action');
        let token = el.querySelector('[name="_token"]').value;

        let dataObj = {
            theme, message
        }

        $.ajax({
            method: "post",
            url: url,
            data: dataObj,
            headers: {'X-CSRF-TOKEN': token},
            success: function (status) {
                console.log(status)
            },
            error: function (error) {
                console.warn(error);
            }
        });
    }
    _setListeners(el) {
        let themeBtns = el.querySelectorAll('.trackfeed_feedItem');
        let input = el.querySelector('[name="feed_theme"]');
        let submit = el.querySelector('.action_btn ');
        let that = this;

        themeBtns.forEach((el) => {
                el.addEventListener('click', (e) => {
                    themeBtns.forEach((el) => {
                        el.classList.remove('feedActive');
                    })

                    e.currentTarget.classList.add('feedActive');

                    let text = e.currentTarget.innerText;
                        input.value = text;
                });
            });

        submit.addEventListener('click', () => {
            that._makeCall(el, input.value);
        });

    }
    constructor() {
        let el = document.querySelector('.trackfeed')

        if(el) {
            this._setListeners(el);
        }
    }
}

export default TrackingFeedController
