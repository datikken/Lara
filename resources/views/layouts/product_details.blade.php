@extends('layouts.index')

<div class="page_content">
    @section('center')
        @include('components.product_details.products_details-item', ['product' => $product ])
    @endsection
</div>
