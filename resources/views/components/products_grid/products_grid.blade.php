@foreach ($products as $product)

@include('components.products_grid.products_grid-item',
    [
        'id' => $product->id,
        'name' => $product->name,
        'image' => $product->image
    ]
)

@endforeach
