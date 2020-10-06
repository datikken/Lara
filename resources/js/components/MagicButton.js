class MagicButton {
    setListener(btn) {
        if(btn) {
            btn.onmousemove = (e) => {
                const x = e.pageX - e.target.offsetLeft
                const y = e.pageY - e.target.offsetTop

                e.target.style.setProperty('--x', `${ x }px`)
                e.target.style.setProperty('--y', `${ y }px`)
            }
        }
    }
    constructor(btn) {
        this.btn = btn;

        this.setListener(this.btn);
    }
}


export default MagicButton;
