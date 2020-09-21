    <div class="postItem">
    <div class="postItem_top">
        <div class="postList_cat postItem_cat">
            <span>{{ $post['category'] }}</span>
        </div>
        <div class="postList_head postItem_head">
            <span>{{ $post['heading'] }}</span>
        </div>
    </div>
    <div class="postItem_wrap">
        @php echo $post['content']; @endphp
    </div>

    <div class="postItem_btns">

        <div class="postList_btns_actions postItem_actions">
            <div class="postList_like">
                <div class="postList_like_icon"></div>
                <div class="postList_like_val">{{ $post['likes'] }}</div>
            </div>

            <div class="postList_dislike">
                <div class="postList_dislike_icon"></div>
                <div class="postList_dislike_val">{{ $post['dislikes'] }}</div>
            </div>

            <div class="postList_comment">
                <div class="postList_comment_icon"></div>
                <div class="postList_comment_val">{{ $post['comments'] }}</div>
            </div>

            <div class="postList_share">
                <div class="postList_share_icon"></div>
                <div class="postList_share_val">{{ $post['shares'] }}</div>
            </div>
        </div>


        <div class="postList_posted postItem_posted">
            <div class="postList_posted_author">
                <span>Опубликовано администратором</span>
            </div>
            <div class="postList_posted_date">
                <span>{{ $post['created_at']->format("m.d.Y") }}</span>
            </div>
        </div>


        <div class="postItem_btns_inner">
            <div class="postItem_btns_item">
                <div class="postItem_backIcon"></div>
                <div class="postItem_backText">назад в ленту блога</div>
            </div>
            <div class="postItem_btns_item">
                <div class="postItem_fwdText">следующая статья</div>
                <div class="postItem_fwdIcon"></div>
            </div>
        </div> 
                
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

    <div class="postItem_block">
        <!-- @include('components.blog.post_auth') -->
        @include('components.blog.post_comments')
    </div>

    @include('components.btn.text_btn', [ 'class' => 'action_btn allcomments_btn', 'text' => 'смотреть все комментарии'])
    @include('components.blog.post_item_commentsForm')

</div>
