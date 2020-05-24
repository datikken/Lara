<div class="postList">
    @foreach ($posts as $post)
            <a href="{{ route('postDetails',['id' => $post['id']]) }}" class="postList_item">
                <div class="postList_cat">
                    <span>{{ $post['category'] }}</span>
                </div>
                <div class="postList_head">
                    <span>{{ $post['heading'] }}</span>
                </div>
            </a>
    @endforeach
</div>
