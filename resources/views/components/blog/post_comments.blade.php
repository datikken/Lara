<div class="postItem_comments postItem_comments-shorten">
    <div class="postItem_comments_header">
        <div class="postItem_comments_header_item">
            <span>комментарии</span>
        </div>
        <div class="postItem_comments_header_item">
            <span>{{ count($comments) }}</span>
        </div>
    </div>

    @foreach ($comments as $comment)
        @include('components.blog.postItem_comments_item', ['comment' => $comment])
    @endforeach

</div>

@include('components.btn.text_btn', [ 'class' => 'action_btn allcomments_btn', 'text' => 'смотреть все комментарии'])
