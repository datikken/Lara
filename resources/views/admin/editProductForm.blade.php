@extends('layouts.admin')

@section('center')
    <h2 class="uk-heading-small">Редактировать продукт</h2>

        <form action="/admin/updateProduct/{{$product->id}}" method="post" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="name" id="name" placeholder="Название продукта" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="type" id="type" placeholder="Тип" required>
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" name="price" id="price" placeholder="Цена"  required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        </form>

@endsection
