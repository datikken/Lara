import Notifications from "../../../../components/Notifications";
import MagicButton from '../../../../components/MagicButton';

let createMagicBtn = function (state, btn) {
    if (btn) {
        btn.classList.remove('disabled_btn');
        new MagicButton(btn);
    }
}

let showNotification = function (state, msg, type) {
    state.notParams.status = type;
    state.notParams.message = msg;

    let notification = new Notifications(state.notParams);
    notification.show();
}

let blockFormInputs = function (state, el) {
    let inputs = el.querySelectorAll('input');

    inputs && inputs.forEach((npt) => {
        npt.value = ''
        npt.setAttribute('disabled', '')
    })
}

export {
    createMagicBtn,
    showNotification,
    blockFormInputs
};
