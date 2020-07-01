<div class="news">
    <div class="news_wrapper-heading">
        <span>Последние новости</span>
    </div>

    <div class="news_wrapper">

        <div class="news_wrapper-block">
            @foreach($news as $new)
                <a href="{{ $new['url'] }}" class="news_wrapper-block-item">
                    <div class="news_wrapper-block-item_inner-item">
                        <div class="news_wrapper-block-item_inner-item-heading">
                            <span>
                                <?
                                    echo str_limit($new->heading, $limit = 28, $end = '...');
                                ?>
                            </span>
                        </div>
                        <div class="news_wrapper-block-item_inner-button">
                            <span>ЧИТАТЬ</span>
                        </div>
                    </div>

                    <div class="news_wrapper-block-item_image">
                        <div class="news_wrapper-block-item_image-inner" style="background-image: url('');">

                            @php preg_match('/<img[^>]+>/i',$new['content'], $result); @endphp
                            @php echo implode($result); @endphp

                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</div>
