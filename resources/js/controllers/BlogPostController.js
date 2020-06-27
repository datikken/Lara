import $ from 'jquery';

class BlogPostController {
    setListeners(block) {
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
                            let url = window.location.href + '/like/' + id;
                            let classList = e.currentTarget.classList.value;

                            if(classList.indexOf('dis') >= 0) {
                                type = 'false';
                            } else {
                                type = 'true';
                            }
                            let data = {
                                    post_id: id,
                                    isLike: type
                                }

                            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': window.token } });
                            $.ajax({
                                method: "post",
                                url: `${url}`,
                                data,
                                success: function (data) {
                                    fixData(data);
                                },
                                error: function (error) {
                                    console.warn(error);
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
        let block = document.querySelector('.postList');
            block && this.setListeners(block);
    }
}

export default BlogPostController;
