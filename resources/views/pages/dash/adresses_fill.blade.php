@extends('layouts.dash')

@section('center')

    <div class="fadress_cont">
        @include('components.dash.fadresses_list')
        @include('components.dash.fadresses')
    </div>

@endsection
