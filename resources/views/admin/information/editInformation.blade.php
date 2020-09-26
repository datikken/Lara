@extends('layouts.admin')

@section('center')

    <form action="/admin/editInformationForm/{{$item->id}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="uk-margin">
            <input class="uk-input" type="text" value="{{ $item->category }}" name="category" id="category" placeholder="Категория" required>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" value="{{ $item->urik_title }}" name="urik_title" id="urik_title" placeholder="Заг юр лица" required>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" value="{{ $item->fizik_title }}"  name="fizik_title" id="fizik_title" placeholder="Заг физ лица" required>
        </div>

        <div class="form-group green-border-focus">
            <textarea class="form-control" name="urik_text" id="urik_text" rows="5" style="resize: none;" placeholder="Текст для юр лица">
                {{ trim($item->urik_text) }}
            </textarea>
        </div>

        <div class="form-group green-border-focus">
            <textarea class="form-control"  name="fizik_text" id="fizik_text" rows="5" style="resize: none;" placeholder="Текст для физ лица">
                {{ trim($item->fizik_text) }}
            </textarea>
        </div>

        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <input type="file" class="upload_file" name="image" id="image">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите иконку" disabled>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

    </form>

@endsection
