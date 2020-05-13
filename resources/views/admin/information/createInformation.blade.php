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

        <h2 class="uk-heading-small">Создать информационный блок</h2>

        <form action="/admin/createInfo" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="uk-margin">
                <input class="uk-input" type="text" name="category" id="category" placeholder="Категория" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="urik_title" id="urik_title" placeholder="Заг юр лица" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="fizik_title" id="fizik_title" placeholder="Заг физ лица" required>
            </div>

            <div class="uk-margin uk-form-row">
                <textarea cols="4" rows="4" class="uk-text-area" type="text" name="urik_text" id="urik_text" placeholder="Текст ор лица" required></textarea>
            </div>

            <div class="uk-margin uk-form-row">
                <textarea cols="4" rows="4" class="uk-text-area" type="text" name="fizik_text" id="fizik_text" placeholder="Текст физ лица" required></textarea>
            </div>

            <div class="uk-margin" uk-margin>
                <div uk-form-custom="target: true">
                    <input type="file" class="upload_file" name="image" id="image" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите иконку" disabled>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        </form>

    </div>

@endsection

{{--$category = $request->input('category');--}}
{{--$type = $request->input('type');--}}
{{--$title = $request->input('title');--}}
{{--$text = $request->input('text');--}}
