<div class="news">
    <div class="news_wrapper">

        <div class="news_wrapper-heading">
            <span>Последние новости</span>
        </div>

        <div class="news_wrapper-block">
            @foreach($products as $product)
                <div class="news_wrapper-block-item">
                    <div class="news_wrapper-block-item_inner-item">
                        <div class="news_wrapper-block-item_inner-item-heading">
                            <span>{{ $product->name }}</span>
                        </div>
                        <div class="news_wrapper-block-item_inner-button">
                            <span>ЧИТАТЬ</span>
                        </div>
                    </div>

                    <div class="news_wrapper-block-item_image">
                        <div class="news_wrapper-block-item_image-inner">
                            <img src='/images/news/item.png' alt="News"/>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
