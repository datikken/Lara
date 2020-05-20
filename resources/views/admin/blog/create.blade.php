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
        <form action="{{route('sendCreatePost')}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="category" id="category" placeholder="Категория" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="heading" id="heading" placeholder="Заголовок" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="author" id="author" placeholder="Описание" required>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-1">Отправить</button>

        </form>


            <script>
                CKEDITOR.replace( 'content', {
                    height: 300,
                    filebrowserUploadUrl: "{{route('adminSavePhoto', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            </script>

    </div>
@endsection
