<div class="postItem_comments postItem_comments-shorten">
    <div class="postItem_comments_header">
        <div class="postItem_comments_header_item">
            <span>комментарии</span>
        </div>
        <div class="postItem_comments_header_item">
            <span>{{ count($comments) }}</span>
        </div>
    </div>

    @foreach ($comments as $key=>$comment)
        @include('components.blog.postItem_comments_item', ['class' => '', 'comment' => $comment])

    {{--@php dump($comments[$key]->id, $comment->parent_id); @endphp--}}

        @if($comments[$key]->id == $comment->parent_id)
           @include('components.blog.postItem_comments_item', ['class' => 'ml100', 'comment' => $comment])
        @endif

    @endforeach

</div>

{{--@php dump($comments); @endphp--}}

@if(count($comments) > 5)
    @include('components.btn.text_btn', [ 'class' => 'action_btn allcomments_btn animated_btn', 'text' => 'смотреть все комментарии'])
@endif
