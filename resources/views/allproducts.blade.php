<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"">

@yield('top')
@extends('layouts.index')

@section('center')
    @foreach ($products as $product)
        <p>This is a product - {{ $product->name }}</p>
        <p>This is a product price - {{ $product->price }}</p>
        <br/>
    @endforeach
@endsection

@yield('bottom')
