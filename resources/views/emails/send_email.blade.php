@extends('layouts.admin')

@section('center')

    <h2 class="uk-heading-small">Отправить письмо</h2>

    @if($message = Session::get('success'))
        <div class="uk-alert-success" uk-alert uk-flex>
            <a class="uk-alert-close" uk-close></a>
            <p>Письмо успешно отправленно.</p>
        </div>
    @endif

    <form action="{{ url('admin/sendemail/send') }}" method="POST" enctype="multipart/form-data">
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
