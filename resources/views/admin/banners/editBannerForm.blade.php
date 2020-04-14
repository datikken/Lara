@extends('layouts.admin')

@section('center')

    <div class="table-responsive">
        <form action="/admin/updateProduct/{{$product->id}}" method="post">

            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{$product->name}}" required>
            </div>

            <div class="form-group">
                <label for="type">Тип</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="Product Type" value="{{$product->type}}" required>
            </div>

            <div class="form-group">
                <label for="type">Цена</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Product Price" value="{{$product->price}}" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection