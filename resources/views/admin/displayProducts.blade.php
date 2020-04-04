@extends('layouts.admin')

@section('center')

    <div class="table-responsive test">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Цена</th>
                <th>Тип</th>
                <th>Описание</th>
                <th>Изображение</th>
                <th>Создан</th>
                <th>Обновлен</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
            <tr>

                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['type']}}</td>
                <td>{{$product['description']}}</td>
                <td><img src="{{ Storage::url('product_images/' . $product['image']) }} " alt=""></td>
                <td>{{$product['created_at']}}</td>
                <td>{{$product['updated_up']}}</td>

                <td>
                    <a href="{{route('adminEditProductImageForm', ['id' => $product['id']]) }}" class="btn btn-primary">Edit product image</a>
                    <a href="{{route('adminEditProductForm', ['id' => $product['id']]) }}" class="btn btn-primary">Edit product</a>
                    <a href="#" class="btn btn-danger">Remove</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection