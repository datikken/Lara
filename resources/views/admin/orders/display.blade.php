@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Заказы</h2>
    </div>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>№</th>
                <th>Статус</th>
                <th>Создан</th>
                <th>Удален</th>
                <th>Цена</th>
                <th>Пользователь</th>
                <th>Оплата</th>
                <th>Изменить</th>
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
                    <td>{{$order['payment_status']}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle mb-3" type="button" data-id="{{ $order['id'] }}" data-url="{{ route('changeOrderStatus', $order['id']) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Статус заказа
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button" data-status="on_hold">Создан</button>
                                <button class="dropdown-item" type="button" data-status="on_delivery">Передан в доставку</button>
                                <button class="dropdown-item" type="button" data-status="delivery_progress">Доставка</button>
                                <button class="dropdown-item" type="button" data-status="arrived">Доставлен</button>
                                <button class="dropdown-item" type="button" data-status="lost">Отменен</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

@endsection
