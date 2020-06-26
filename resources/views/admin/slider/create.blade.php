@extends('layouts.admin')

@section('center')
    <script src=" {{ asset('js/vendors/dropzone.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.css">

    <h2 class="uk-heading-small">Добавить изображения</h2>

    <form action="/admin/sliderCreate" method="post" enctype="multipart/form-data" class="dropzone">
        {{ csrf_field() }}
    </form>


    <a href="{{ route('AdminMainSlider') }}" class="mt-5" style="display: block;">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </a>



@endsection
