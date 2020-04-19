@extends('layouts.admin')

@section('center')
    <h2 class="uk-heading-small">Редактировать блок информации</h2>

    <form action="/admin/editInformationForm/{{$item->id}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
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

        <button type="submit" name="submit" class="btn btn-primary uk-button uk-button-default">Отправить</button>

    </form>

@endsection
