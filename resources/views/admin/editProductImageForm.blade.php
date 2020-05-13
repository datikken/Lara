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

        <h2 class="uk-heading-small">Текущее изображение</h2>

        <div>
            <img src="{{ Storage::url('product_images/' . $product['image']) }}"
                 width="200"
                 height="200"
                 style="max-height: 220px;
              object-fit: cover;"
                 alt=""/>
        </div>

        <form action="/admin/updateProductImage/{{$product->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="uk-margin" uk-margin>
                <div uk-form-custom="target: true">
                    <input type="file" class="" name="image" id="image" value="{{$product->image}}" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите изображение" disabled>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
        </form>

    </div>


@endsection
