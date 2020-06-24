@foreach ($products as $product)
    {{--@php dump($product->name_buh); @endphp--}}
    @include('components.products_grid.products_grid-item',
        [
            'id' => $product->id,
            'name' => $product->name,
            'name_buh' => $product->name_buh,
            'image' => $product->image,
            'price' => $product->price,
            'category' => $product->category
        ]
    )
@endforeach

<div class="pagination_links">
    {{ $products->links() }}
</div>
