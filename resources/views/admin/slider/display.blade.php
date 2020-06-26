@extends('layouts.admin')

@section('center')

    <div class="d-flex flex-row align-items-center m-2 ml-0">
        <h2 class="mr-3">Главный слайдер</h2>
        <a href="{{ route('AdminDisplayCreateMainSlider') }}" class="btn btn-primary">
           Создать
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Изображение</th>
                <th>Добавлено</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($images as $image)
                <tr>
                    <td>{{$image['image']}}</td>
                    <td>{{$image['created_at']}}</td>
                    <td>
                        <a href="{{ route('AdminDeleteMainSlider', ['id' => $image['id']]) }}" class="btn btn-danger">
                            <span class="ui-icon uk-icon" uk-icon="close"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="close"><path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path><path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path></svg></span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
