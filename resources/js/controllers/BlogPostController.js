import $ from 'jquery';

class BlogPostController {
    setListeners(block) {
        let posts = block.querySelectorAll('.postList_item');
            posts.forEach((el, i) => {
                let like = el.querySelector('.postList_like');
                let dislike = el.querySelector('.postList_dislike');
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
                                   console.log(data);
                                },
                                error: function (error) {
                                    console.warn(error);
                                }
                            });

                            console.log(url, data);

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
