@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Заказы</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>№</th>
                <th>Статус</th>
                <th>Создан</th>
                <th>Удален</th>
                <th>Цена</th>
                <th>Пользователь</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{$order['status']}}</td>
                    <td>{{$order['date']}}</td>
                    <td>{{$order['del date']}}</td>
                    <td>{{$order['price']}}</td>
                    <td>{{$order['user_id']}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
