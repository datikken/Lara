@extends('layouts.index')

<div class="page_content">
    @section('center')
        @include('components.product_details.products_details-item', ['product' => $product ])

        @include('components.product_details.product_details_menu')

        @include('components.product_details.product_capacity')

        @include('components.product_details.product_chrst')

        @include('components.product_details.product_desc')

        @include('components.feedback.feedback_thanks')

        @include('components.product_details.product_feedback-item', ['feedbacks' => $feedbacks ])
        @include('components.product_details.product_feedback-form', ['product' => $product ])

    @endsection
</div>
