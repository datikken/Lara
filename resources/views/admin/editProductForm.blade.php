@extends('layouts.admin')

@section('center')
        <div class="d-flex flex-row align-items-center mt-2 mb-2">
            <h2 class="mr-3">Редактировать продукт</h2>
        </div>

        <form action="/admin/updateProduct/{{$product->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="name" id="name" placeholder="Название продукта" required vale="{{ $product->name }}">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" name="price" id="price" placeholder="Цена"  required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        </form>

@endsection
