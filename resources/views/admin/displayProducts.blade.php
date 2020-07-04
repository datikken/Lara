@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Продукты</h2>

        <a href="{{ route('adminCreateProductForm') }}">
            <button class="btn btn-primary">
                Создать
            </button>
        </a>

        <form action="{{ route('fetchProducts') }}" method="post" class="ml-2">
            @csrf
            <button class="btn btn-primary fetch_btn" type="submit">
                Синхронизироваться
            </button>
        </form>

    </div>

    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Цена</th>
                {{--<th>Тип</th>--}}
                {{--<th>Описание</th>--}}
                <th>Изображение</th>
                <th>Создан</th>
                <th>Фото</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>@php echo str_limit($product['name'], $limit = 40, $end = '...'); @endphp</td>
                <td>{{$product['price']}}</td>
                {{--<td>{{$product['type']}}</td>--}}
                {{--<td>{{$product['description']}}</td>--}}
                <td><img uk-img style="height: 40px; object-fit: contain" src="{{ Storage::url('product_images/' . $product['image']) }}"/></td>
                <td>{{$product['created_at']}}</td>
                <td>
                    <a href="{{ route('dropZoneForm', ['id' => $product['id']])}}">
                        <svg class="bi bi-card-image" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 00-.5.5v9a.5.5 0 00.5.5h13a.5.5 0 00.5-.5v-9a.5.5 0 00-.5-.5zm-13-1A1.5 1.5 0 000 3.5v9A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 2h-13z" clip-rule="evenodd"/>
                            <path d="M10.648 7.646a.5.5 0 01.577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71z"/>
                            <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <a href="{{route('adminEditProductForm', ['id' => $product['id']]) }}">
                        <svg class="bi bi-gear" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 014.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 01-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 011.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 012.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 012.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 011.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 01-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 018.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 001.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 00.52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 00-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 00-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 00-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 00-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 00.52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 001.255-.52l.094-.319z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 100 4.492 2.246 2.246 0 000-4.492zM4.754 8a3.246 3.246 0 116.492 0 3.246 3.246 0 01-6.492 0z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </td>

                <td>
                    <a href="{{ route('adminDeleteProduct', ['id' => $product['id']])}}" class="btn btn-danger">
                        <span class="ui-icon" uk-icon="close">X</span>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    </div>

    {{ $products->links() }}

@endsection
