<div class="postItem">
    <div class="postItem_wrap">
        @php echo $post['content']; @endphp
    </div>

    <div class="postItem_footer">
        <div class="postItem_footer_inner">
            <div class="postItem_footer_item">
                <span class="postItem_text">Понравилась статья?</span>
                <span class="postItem_like"></span>
                <span class="postItem_dislike"></span>
            </div>
            <div class="postItem_footer_item">
                <span class="postItem_text">Поделиться в соц.сетях</span>
                <div class="postItem_face"></div>
                <div class="postItem_insta"></div>
                <div class="postItem_tele"></div>
                <div class="postItem_vk"></div>
            </div>
        </div>
    </div>

    @include('components.blog')


</div>
