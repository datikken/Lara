import $ from 'jquery';
import MagicButton from '../components/MagicButton'

class BlogPostController {
    _createMagicButtons() {
        let btns = document.querySelectorAll('.magic_btn');
            btns.forEach(btn => {
               let mbtn = new MagicButton(btn);

               console.warn('btns.forEach', mbtn);
            })

    }
    _clearForm() {
        let inputs = this.commentsForm.querySelectorAll('input');
        let area = this.commentsForm.querySelector('[name="message"]');
            area.value = '';
            inputs.forEach(npt => npt.value = '');
    }
    _makeRequest({ name, email, message, postId }) {
        let parentId = document.querySelector('[data-blogcommentpostid]').dataset.blogcommentpostid;
        let that = this;

        fetch(this.route, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                name, email, message, postId
            })
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            that._clearForm();
        })

        .catch(err => console.error(err.message))
    }
    activateComments() {
        let submit = this.commentsForm.querySelector('.blogCom_submit');
        let inputs = this.commentsForm.querySelectorAll('input');
        let area = this.commentsForm.querySelector('[name="message"]');
        let dataObj = {};
        let that = this;

        submit.addEventListener('click', function() {

            inputs.forEach(npt => {
                let name = npt.getAttribute('name')
                let val = npt.value;

                dataObj[name] = val;
            })

            dataObj[area.getAttribute('name')] = area.value;
            dataObj['postId'] = that.postId;


            that._makeRequest(dataObj)
        })
    }
    setListenersLikesDislikes(block) {
        let posts = block.querySelectorAll('.postList_item');
            posts.forEach((el, i) => {
                let like = el.querySelector('.postList_like');
                let dislike = el.querySelector('.postList_dislike');

                let like_val = el.querySelector('.postList_like_val');
                let disl_val = el.querySelector('.postList_dislike_val');

                let type;

                let arr = [like, dislike];
                    arr.forEach((item) => {
                        item.addEventListener('click', function(e) {
                            let id = posts[i].getAttribute('data-id');

                            let url = '/blog/like/' + id;
                                url = url.replace('#','');

                            let classList = e.currentTarget.classList.value;

                            if(classList.indexOf('dis') >= 0) {
                                type = 'false';
                            } else {
                                type = 'true';
                            }

                            let dataObj = {};
                                dataObj.isLike = type;
                                dataObj.post_id = id;


                            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': window.token } });
                            $.ajax({
                                method: "post",
                                url: `${url}`,
                                data: dataObj,
                                success: function (data) {
                                    fixData(data);
                                },
                                error: function (error) {
                                    let el = document.querySelector('#shouldBeLoggedIn');

                                    UIkit.modal(el).show();
                                }
                            });

                            function fixData(data) {
                                if(data.likes) {
                                    like_val.innerText = data.likes;
                                } else {
                                    like_val.innerText = 0;
                                }

                                if(data.dislikes) {
                                    disl_val.innerText = data.dislikes;
                                } else {
                                    disl_val.innerText = 0;
                                }
                            }
                        });
                    });
            })
    }
    constructor() {
        this.block = document.querySelector('.postList');
        this.commentsForm = document.querySelector('[data-blogCommentsForm]');

        if(this.commentsForm) {
            this.postId = document.querySelector('[data-blogCommentPostId]').dataset.blogcommentpostid;
            this.route = document.querySelector('[data-blogCommentRoute]').dataset.blogcommentroute;
            this.activateComments();
        }

        if(this.block) {
            this._createMagicButtons();
            this.setListenersLikesDislikes(this.block);
        }
    }
}

export default BlogPostController;
