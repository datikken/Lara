@extends('layouts.admin')

@section('center')

    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">О нас</h2>

        <a href="{{ route('adminDisplayCreateAbout') }}" class="btn btn-primary">
           Создать
        </a>

        <div class="dropdown ml-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Добавить год для описания
            </button>
            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Описать год"
                    name="year"
                    aria-label="year"
                    aria-describedby="years"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                    data-saveYearInput>

                <a href="#" class="btn btn-primary" data-saveYearTrigger>
                    Сохранить
                </a>

            </div>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Год</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Содержание</th>
                <th>Создан</th>
                <th>Обновлен</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($years as $year)
                <tr>
                    <td>{{$year['year']}}</td>
                    <td>{{$year['heading']}}</td>
                    <td>{{$year['description']}}</td>
                    <td>{{$year['text']}}</td>
                    <td>{{$year['created_at']}}</td>
                    <td>{{$year['updated_at']}}</td>

                    <td>
                        <a href="{{ route('AdminDeleteAbout', ['id' => $year['id']]) }}" class="btn btn-danger">
                            <span class="ui-icon uk-icon" uk-icon="close"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="close"><path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path><path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path></svg></span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    {{ $years->links() }}

@endsection
