class ProfileController {
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
        }
    }
}

export default ProfileController;
