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

        <h2 class="uk-heading-small">Блог пост</h2>

        <form action="/admin/sendCreatePost" method="post" enctype="multipart/form-data">

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


            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                    </div>
                </div>
            </div>


            <button type="submit" name="submit" class="btn btn-primary uk-button uk-button-default">Отправить</button>

        </form>


            <script>
                CKEDITOR.replace( 'content', {
                    height: 300,
                    filebrowserUploadUrl: "upload.php"
                });
            </script>

    </div>
@endsection
