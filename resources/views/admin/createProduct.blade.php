@extends('layouts.admin')

@section('center')
    <div class="table-responsive">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>{!! print_r($errors->all()) !!}</li>
                </ul>
            </div>
        @endif
        <h2 class="uk-heading-small">Добавить новый продукт</h2>

        <form action="/admin/sendCreateProductForm" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="name" id="name" placeholder="Название продукта" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="description" id="description" placeholder="Название продукта" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="type" id="type" placeholder="Тип" required>
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" name="category" id="category" placeholder="Категория"  required>
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" name="price" id="price" placeholder="Цена"  required>
            </div>

            <div class="uk-margin" uk-margin>
                <div uk-form-custom="target: true">
                    <input type="file" class="upload_file" name="image" id="image" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите изображение" disabled>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary uk-button uk-button-default">Отправить</button>

        </form>
    </div>

@endsection
