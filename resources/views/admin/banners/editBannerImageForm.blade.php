@extends('layouts.admin')

@section('center')
    <div class="table-responsive">

        @if($errors->any())

            <div class="alert-danger alert">
                <ul>

                    <li>{!! print_r($errors->all()) !!}</li>

                </ul>
            </div>
        @endif

        <h3>Current Image</h3>

        <div>
            <img src="{{ Storage::url('product_images/' . $product['image']) }}"
                  width="200"
                  height="200"
                  style="max-height: 220px;
                  object-fit: cover;"
                  alt=""/>
        </div>
        <br>
        <form action="/admin/updateProductImage/{{$product->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="description">Update image</label>
                <br>
                <input type="file" class="" name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>


@endsection