@extends('layouts.admin')

@section('center')

    <h2 class="mt-3">Пользователи</h2>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <td>Id</td>
                <th>Имя</th>
                <th>Почта</th>
                <th>Создан</th>
                <th>Обновлен</th>
                <th>Юр/Физ</th>
                <th>Статус</th>
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
                    <td>


                        <div class="dropdown" data-setAdmin="true" data-userId="{{ $user['id'] }}">
                            <button class="btn btn-secondary dropdown-toggle mb-3" type="button" data-id="{{ $user['id'] }}" data-url="{{ route('MakeUserAdmin', $user['id'] ) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Статус
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button" data-status="admin">Админ</button>
                                <button class="dropdown-item" type="button" data-status="dude">Чувак</button>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    {{ $users->links() }}

@endsection
