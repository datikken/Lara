@extends('layouts.index')

<div class="page_content">
    @section('center')
        @include('components.product_details.products_details-item', ['product' => $product ])

        @include('components.product_details.product_feedback-item', ['feedbacks' => $feedbacks ])

        @include('components.product_details.product_feedback-form', ['product' => $product ])
    @endsection
</div>
