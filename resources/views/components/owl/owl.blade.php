<div class="owl-wrapper">
    <div class="owl-controls-heading">
        <div class="owl-controls-heading-item">Новинки</div>
    </div>

    <div class="owl-carousel owl-theme">
        @foreach ($products as $key=>$product)
            @include('components.owl.owl_card', $product)
        @endforeach
    </div>
</div>
