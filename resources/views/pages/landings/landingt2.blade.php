@extends('layouts.index')
@section('center')

<div class="landingt">
    @include('components.landingt.thead')
    @include('components.landing.feedback')
    @include('components.landingt.features')
    @include('components.landingt.questions')
    @include('components.product_details.product_feedback-form', ['product' => $product])
</div>

@endsection