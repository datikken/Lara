class BlogPostController {
    _setListeners(btn, id) {
        console.warn(btn, 'test');

        btn.addEventListener('click', function(e) {
            let form = document.querySelector('#blogCom');
                form.setAttribute('data-commentRespId', id);

            window.location.href = '#blogCom';
        })
    }
    _declare() {
        this.comments = document.querySelectorAll('[data-commentId]');
        let that = this;

        this.comments.forEach(el => {
            let btn = el.querySelector('[data-commentRespond]');
            let id = el.getAttribute('data-commentId');

            that._setListeners(btn, id);
        })
    }
    constructor() {
        this._declare();
    }
}

export default BlogPostController;
