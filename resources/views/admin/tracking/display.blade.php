@extends('layouts.admin')

@section('center')

    <h2 class="mt-3">Отзывы</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Пользователь</th>
                <th>Тема</th>
                <th>Содержание</th>
                <th>Создан</th>
            </tr>
            </thead>

            <tbody>
            @foreach($infos as $info)
                <tr>
                    <td>{{ $info['order_id'] }}</td>
                    <td>{{ $info['user_id'] }}</td>
                    <td>{{ $info['theme'] }}</td>
                    <td>{{ $info['message'] }}</td>
                    <td>{{ $info['created_at'] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
