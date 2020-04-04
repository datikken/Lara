@extends('layouts.admin')

@section('center')

    <div class="table-responsive test">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['image']}}</td>

                <td>
                    {{--<a href="{{route('admin.products.editImageForm', ['id' => $product['id']]) }}" class="btn btn-primary">Edit image</a>--}}
                    {{--<a href="{{route('admin.products.editForm', ['id' => $product['id']]) }}" class="btn btn-primary">Edit</a>--}}
                    {{--<a href="{{route('admin.products.delete', ['id' => $product['id']]) }}" class="btn btn-primary">Delete</a>--}}
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection