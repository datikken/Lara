/*
    @message - displayed in notification
    @status - notification style
    @pos
    @timeout
 */

class Notifications {
    checkPosition() {
        console.warn('check pos inside notific')

        let fixedTop = document.querySelector('.topFixedMenu');
        let notification = document.querySelector('.uk-notification');

        if (fixedTop) {
            notification.style.top = '50px';
        }

        window.addEventListener('scroll', function () {
            let notification = document.querySelector('.uk-notification');

            if (window.pageYOffset >= 60) {
                if (notification) {
                    notification.style.top = '50px';
                }
            } else {
                if (notification) {
                    notification.style.top = '56px';
                }
            }
        })
    }

    show() {
        let defParams = {
            message: status.message,
            status: 'primary',
            pos: 'top-center',
            timeout: 5000
        }

        if (this.params) {
            defParams = this.params;
        }

        UIkit.notification(defParams);
        this.checkPosition();
    }

    hide() {
        UIkit.notification.closeAll()
    }

    constructor(params) {
        this.params = params
    }
}


export default Notifications
