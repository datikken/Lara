@extends('layouts.index')

@section('center')
    @include('components.product_details.products_details-item', ['product' => $product ])

    @include('components.product_details.product_details_menu')

    @include('components.product_details.product_capacity',['class' => '', 'product' => $product ])
    @include('components.product_details.product_chrst',['class' => 'as-none' ])
    @include('components.product_details.product_desc',['class' => 'as-none' ])
    @include('components.feedback.feedback_thanks',['class' => 'as-none' ])
    @include('components.product_details.product_feedback-form', ['product' => $product, 'class' => 'as-none' ])

@endsection
