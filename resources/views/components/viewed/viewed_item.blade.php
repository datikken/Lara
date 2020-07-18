<div class="viewed_wrapper-item">
    <div class="viewed_wrapper-item_image">
        <img onerror="this.src = '/images/unnecessary/owl-swiper.svg';" src="{{ Storage::url('product_images/' . json_decode($product['params'])->brand . '/Small/' . $product['photo'] . '.png') }}" alt="{{ $product['photo'] }}" />
    </div>
    <div class="viewed_wrapper-item_text">
        <div class="viewed_wrapper-item_text-heading">
            <span>{{ $product['category'] }}</span>
            <br />
            <span class="viewed_wrapper-item_text-heading-item">
                @php echo json_decode($product['name_econom']) @endphp
            </span>
        </div>
        <div class="viewed_wrapper-item_text-price">
            <span>@php echo floor($product['price']); @endphp</span>
            <img src="/images/icons/rub.svg" alt="rub" />
        </div>
    </div>
</div>
