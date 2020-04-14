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

            <h2>Добавить новый баннер</h2>

            <form action="/admin/sendCreateProductForm" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}


                <div class="form-group">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Название продукта" required>
                </div>

                <div class="form-group">
                    <label for="type">Тип</label>
                    <input type="text" class="form-control" name="type" id="type" required>
                </div>

                <div class="form-group">
                    <label for="type">Категория</label>
                    <input type="text" class="form-control" name="category" id="type" required>
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>

                <div class="form-group">
                    <label for="description">Изображение</label>
                    <input type="file" class="form-control upload_file" name="image" id="image" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

            </form>

    </div>

@endsection
