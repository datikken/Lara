<div class="postList">
    @foreach ($posts as $post)
            <div class="postList_item">
                <div class="postList_cat">
                    <span>{{ $post['category'] }}</span>
                </div>
                <div class="postList_head">
                    <span>{{ $post['heading'] }}</span>
                </div>

                @php preg_match('/<img[^>]+>/i',$post['content'], $result); @endphp
                @php echo implode($result); @endphp

                <div class="postList_description">
                    <span>{{ $post['description'] }}</span>
                </div>

                <div class="postList_btns">
                    <div class="postList_btns_inner">
                        <a href="{{ route('postDetails',['id' => $post['id']]) }}">
                            @include('components.btn.text_btn', [ 'class' => '', 'text' => 'Читать далее'])
                        </a>

                        <div class="postList_btns_actions">
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
                                <div class="postList_comment_val">{{ $post['dislikes'] }}</div>
                            </div>

                            <div class="postList_share">
                                <div class="postList_share_icon"></div>
                                <div class="postList_share_val">{{ $post['shares'] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="postList_posted">
                        <div class="postList_posted_author">
                            <span>Опубликовано администратором</span>
                        </div>
                        <div class="postList_posted_date">
                            <span>{{ $post['created_at']->format("m.d.Y") }}</span>
                        </div>
                    </div>

                </div>
            </div>
    @endforeach
</div>
