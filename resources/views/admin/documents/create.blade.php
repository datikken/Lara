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

        <h2 class="uk-heading-small">Создать документ</h2>

        <form action="{{ route('AdminCreateDocument') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="uk-margin" uk-margin>
                <div uk-form-custom="target: true">
                    <input type="file" class="upload_file" name="file" id="file" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Добавить файл" disabled>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        </form>

    </div>

@endsection
