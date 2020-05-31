@extends('layouts.admin')

@section('center')

    <div class="d-flex flex-row align-items-center m-2 ml-0">
        <h2 class="mr-3">Блог</h2>

        <a href="{{ route('adminDisplayCreateForm') }}">
            <button class="btn btn-primary">
                Создать
            </button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Контент</th>
                <th>Создан</th>
                <th>Обновлен</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{{$post['category']}}</td>
                    <td>{{\App\Includes\HelperString::truncate($post['heading'], 50)}}</td>
                    <td>{{ \App\Includes\HelperString::truncate($post['description'], 50)  }}</td>
                    <td>{{\App\Includes\HelperString::truncate($post['content'], 50)}}</td>
                    <td>{{$post['created_at']}}</td>
                    <td>{{$post['updated_at']}}</td>
                    <td>
                        <a href="{{ route('AdminEditPost', ['id' => $post['id']]) }}" class="btn btn-primary">
                            <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('AdminDeletePost', ['id' => $post['id']]) }}" class="btn btn-danger">
                            <span class="ui-icon uk-icon" uk-icon="close"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="close"><path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path><path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path></svg></span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    {{ $posts->links() }}

@endsection
