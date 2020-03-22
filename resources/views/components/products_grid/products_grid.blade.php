@foreach ($products as $product)

@include('components.products_grid.products_grid-item',
    ['name' => $product->name]
)

@endforeach
