<div class="viewed">
    <div class="viewed-item_heading">
        <span class="viewed_wrapper-item_heading-text">Просмотренные товары</span>
    </div>

    <div class="viewed_wrapper">



        @foreach($products as $product)
            @include('components.viewed.viewed_item',['product' => $product])
        @endforeach

    </div>
</div>
