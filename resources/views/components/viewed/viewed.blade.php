<div class="viewed">
    <div class="viewed_wrapper">
        <div class="viewed_wrapper-item_heading">
            <span class="viewed_wrapper-item_heading-text">Просмотренные товары</span>
        </div>

        @foreach($products as $product)
            @include('components.viewed.viewed_item',['product' => $product])
        @endforeach

    </div>
</div>
