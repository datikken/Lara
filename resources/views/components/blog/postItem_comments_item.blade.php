<div class="postItem_comments_item <? if(isset($class)) { echo $class; }?>">
    <div class="postItem_comments_col">
        <div class="postItem_comments_avatar"></div>
    </div>
    <div class="postItem_comments_col">
        <div class="postItem_comments_nick">
            <span>{{ $comment->name }}</span>
            <span class="postItem_date">{{ $comment->created_at }}</span>
        </div>
        <div class="postItem_comments_comment">
            <span>Не стоит обращаться за заменой картриджа, ресурс которого исчерпан. Сотрудник сервисного центра определит отсутствие чернил в картридже и откажет в замене.</span>
        </div>
    </div>
    <div class="postItem_comments_col">
        <div class="postItem_comments_col_item">
            <div class="postItem_comments_like"></div>
            <span class="postItem_comments_likeCount">0</span>
            <div class="postItem_comments_dislike"></div>
            <span class="postItem_comments_dislikeCount">0</span>
            <div class="postItem_comments_response"></div>
            <div class="postItem_comments_responseCount">0</div>
        </div>
        <div class="postItem_comments_col_item">
            <div class="postItem_comments_responseBtn">
                <span class="postItem_comments_responseBtn_icon"></span>
                <span class="postItem_comments_responseBtn_item">ответить</span>
            </div>
        </div>
    </div>
</div>
