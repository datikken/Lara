@extends('layouts.admin')

@section('center')

    <h2 class="mt-3">Пользователи</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <td>Id</td>
                <th>Имя</th>
                <th>Почта</th>
                <th>Создан</th>
                <th>Обновлен</th>
                <th>Юр/Физ</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                    <td>{{ $user['updated_at'] }}</td>
                    <td>@php if($user['face'] === 'face'){ echo "Физик"; } else { echo "Юрид.";} @endphp</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    {{ $users->links() }}

@endsection
