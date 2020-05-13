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

                <div class="form-group">
                    <label for="name">Название</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Название продукта" required>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <input class="form-control"  type="text" name="description" id="description" placeholder="Описание" required>
                </div>

                <div class="form-group">
                    <label for="type">Тип</label>
                    <input class="form-control"  type="text" name="type" id="type" placeholder="Тип" required>
                </div>

                <div class="form-group">
                    <label for="description">Категория</label>
                    <input class="form-control"  type="text" name="category" id="category" placeholder="Категория" required>
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input class="form-control"  type="text" name="price" id="price" placeholder="Цена" required>
                </div>

                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" class="upload_file" name="image" id="image" required>
                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите изображение" disabled>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
    </div>

@endsection
