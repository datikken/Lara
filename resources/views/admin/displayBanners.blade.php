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

            @foreach($banners as $banner)
                <tr>

                    <td>{{$banners['id']}}</td>
                    <td>{{$banner['name']}}</td>
                    <td>{{$banner['price']}}</td>
                    <td>{{$banner['type']}}</td>
                    <td>{{$banner['description']}}</td>
                    <td><img style="height: 100px; object-fit: cover" src="{{ Storage::url('product_images/' . $banner['image']) }}"/></td>
                    <td>{{$banner['created_at']}}</td>
                    <td>{{$banner['updated_up']}}</td>

                    <td>
                        <a href="{{route('adminEditProductImageForm', ['id' => $banner['id']]) }}" class="btn btn-outline-primary">Edit product image</a>
                        <a href="{{route('adminEditProductForm', ['id' => $banner['id']]) }}" class="btn btn-outline-primary">Edit product</a>
                        <a href="{{route('adminDeleteProduct', ['id' => $banner['id']])}}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $banner->links() }}

    </div>

@endsection