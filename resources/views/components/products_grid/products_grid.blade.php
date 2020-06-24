@foreach ($products as $product)
    @include('components.products_grid.products_grid-item',
        [
            'id' => $product->id,
            'name' => $product->name_econom,
            'image' => $product->image,
            'price' => $product->price,
            'category' => $product->category
        ]
    )
@endforeach

<div class="pagination_links">
    {{ $products->links() }}
</div>
