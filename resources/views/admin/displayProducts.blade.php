@extends('layouts.admin')

@section('center')

    <div class="table-responsive">
        <table class="uk-table">
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
                <td><img uk-img style="height: 40px; object-fit: contain" src="{{ Storage::url('product_images/' . $product['image']) }}"/></td>
                <td>{{$product['created_at']}}</td>
                <td>{{$product['updated_at']}}</td>

                <td>
                    <a href="{{route('adminEditProductImageForm', ['id' => $product['id']]) }}" class="btn btn-outline-primary">
                        <span uk-icon="camera" class="uk-margin-small-right uk-icon"></span>
                    </a>
                </td>

                <td>
                    <a href="{{ route('dropZoneForm', ['id' => $product['id']])}}" class="btn btn-danger">
                        <span uk-icon="grid" class="uk-margin-small-right uk-icon"></span>
                    </a>
                </td>

                <td>
                    <a href="{{route('adminEditProductForm', ['id' => $product['id']]) }}" class="btn btn-outline-primary">
                        <span uk-icon="pencil" class="uk-margin-small-right uk-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="pencil"><path fill="none" stroke="#000" d="M17.25,6.01 L7.12,16.1 L3.82,17.2 L5.02,13.9 L15.12,3.88 C15.71,3.29 16.66,3.29 17.25,3.88 C17.83,4.47 17.83,5.42 17.25,6.01 L17.25,6.01 Z"></path>
                            <path fill="none" stroke="#000" d="M15.98,7.268 L13.851,5.148"></path>
                        </svg>
                        </span>
                    </a>
                </td>

                <td>
                    <a href="{{ route('adminDeleteProduct', ['id' => $product['id']])}}" class="btn btn-danger">
                        <span class="ui-icon" uk-icon="close"></span>
                    </a>
                </td>

            </tr>
            @endforeach

            </tbody>
        </table>

        <ul class="uk-pagination">
            {{ $products->links() }}
        </ul>

    </div>

@endsection
