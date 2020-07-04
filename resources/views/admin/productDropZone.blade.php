@extends('layouts.admin')
@section('center')
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.css">

    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Добавить изображения</h2>

        <a href="{{ route('cleanProductImages', [ 'id' => $id ]) }}">
            <button class="btn btn-primary">
                Очистить изображения продукта
            </button>
        </a>
    </div>
    <form action="{{ route('addMultipleProductImages',['id' => $id]) }}" method="post" enctype="multipart/form-data" class="dropzone">
        {{csrf_field()}}
    </form>

    <a href="{{ route('adminDisplayProducts') }}" class="mt-5" style="display: block;">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </a>


@endsection
