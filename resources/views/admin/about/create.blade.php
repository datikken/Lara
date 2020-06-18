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

        <h2 class="uk-heading-small">Описать год</h2>

        <form action="/admin/sendCreateAbout" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="year" id="year" placeholder="Год" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="heading" id="heading" placeholder="Заголовок" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="description" id="description" placeholder="Описание" required>
            </div>

            <div class="uk-margin uk-form-row">
                <textarea cols="4" rows="4" class="uk-text-area" type="text" name="text" id="text" placeholder="Текст" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        </form>

    </div>

@endsection
