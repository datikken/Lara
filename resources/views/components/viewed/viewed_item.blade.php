<div class="viewed_wrapper-item">
    <div class="viewed_wrapper-item_image">
        <img src="{{Storage::disk('local')->url('/product_images/' . $product['image'] )}}" alt="{{ $product['image']}}"} alt="" />
    </div>
    <div class="viewed_wrapper-item_text">
        <div class="viewed_wrapper-item_text-heading">
            <span>{{ $product['category'] }}</span>
            <br />
            <span class="viewed_wrapper-item_text-heading-item">{{ $product['name'] }}</span>
        </div>
        <div class="viewed_wrapper-item_text-price">
            <span>@php echo floor($product['price']) @endphp</span>
            <img src="/images/icons/rub.svg" alt="rub" />
        </div>
    </div>
</div>
