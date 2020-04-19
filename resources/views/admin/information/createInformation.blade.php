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
                <input class="uk-input" type="text" name="category" id="category" placeholder="Название категории" required>
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="type" id="type">
                    <option value="fizicheskoe_litso">Физическое лицо</option>
                    <option value="uridicheskoe_litso">Юридическое лицо</option>
                </select>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" name="title" id="title" placeholder="Название элемента" required>
            </div>

            <div class="uk-margin uk-form-row">
                <textarea cols="4" rows="4" class="uk-text-area" type="text" name="text" id="text" placeholder="Содержание" required></textarea>
            </div>

            <div class="uk-margin" uk-margin>
                <input type="file" class="upload_file" name="image" id="image" required>
                {{--<input class="uk-input uk-form-width-medium" type="file" placeholder="Выберите иконку" disabled>--}}
            </div>

            <button type="submit" name="submit" class="btn btn-primary uk-button uk-button-default">Отправить</button>

        </form>

    </div>

@endsection

{{--$category = $request->input('category');--}}
{{--$type = $request->input('type');--}}
{{--$title = $request->input('title');--}}
{{--$text = $request->input('text');--}}
