let changeProgressStep = function(state, text) {
    let line = document.querySelector('.cart_wrap-crumb').querySelector('.active-item');

    if (state.cartStep === 0) {
        line.style.width = '37%';
    }
    if (state.cartStep === 1) {
        line.style.width = '65%';
    }
    if (state.cartStep === 2) {
        line.style.width = '100%';
    }
    if (state.cartStep === 3) {
        line.style.width = '100%';
    }

    state.cartStep++;
}

export {changeProgressStep};
