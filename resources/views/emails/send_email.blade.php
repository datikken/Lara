@extends('layouts.admin')

@section('center')

    <h2 class="uk-heading-small">Отправить свободное письмо</h2>

    <form action="{{ url('sendemail/send') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="uk-margin">
            <input class="uk-input" type="text" name="name" id="name" placeholder="Введите свое имя" required>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" name="email" id="email" placeholder="Введите свою почту" required>
        </div>

        <div class="uk-margin uk-form-row">
            <textarea cols="4" rows="4" class="uk-text-area" type="text" name="message" id="message" placeholder="Текст физ лица" required></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary uk-button uk-button-default">Отправить</button>
    </form>


@endsection
