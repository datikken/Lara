@php #dump($product->name); @endphp

<a class="viewed_wrapper-item" href="{{ route('ShowProductDetails',['id' => $product->id]) }}">
    <div class="viewed_wrapper-item_image">

        @php dump($product); @endphp

        {{--<img onerror="this.src = '/images/unnecessary/owl-swiper.svg';" src="{{ Storage::url('product_images/' . json_decode($product->params)->brand . '/SMALL/' . $product->photo . '.png') }}" alt="{{ $product->photo }}" />--}}
    </div>
    <div class="viewed_wrapper-item_text">
        <div class="viewed_wrapper-item_text-heading">
            <span class="viewed_wrapper-item_text-heading-item">
                @php echo \App\Includes\HelperString::truncate($product->name, 50) @endphp
            </span>
        </div>
        <div class="viewed_wrapper-item_text-price">
            <span>@php echo floor($product->price); @endphp</span>
            <img src="/images/icons/rub.svg" alt="rub" />
        </div>
    </div>
</a>
