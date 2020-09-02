@extends('layouts.admin')

@section('center')

    <h1 class="bd-title mt-2" id="content">Данные</h1>

    <div class="d-flex p-2 bd-highlight">
        <div class="mr-3">
            <span>Город:</span>
            <p>
                {{ $order['order_info']->adress->city }}
            </p>
        </div>

        <div class="mr-3">
            <span>Улица:</span>
            <p>
                {{ $order['order_info']->adress->street  }}
            </p>
        </div>

        <div class="mr-3">
            <span>Дом:</span>
            <p>
                {{ $order['order_info']->adress->house  }}
            </p>
        </div>

        <div class="mr-3">
            <span>Корпус:</span>
            <p>
                {{ $order['order_info']->adress->body  }}
            </p>
        </div>

        <div class="mr-3">
            <span>Строение:</span>
            <p>
                {{ $order['order_info']->adress->building  }}
            </p>
        </div>
    </div>

    <hr>

    <span>Телефон:</span>
    <p>
        {{ $order['order_info']->fio->tel }}
    </p>

    <span>Имя:</span>
    <p>
        {{ $order['order_info']->fio->firstname }}
    </p>

    <span>Фамилия:</span>
    <p>
        {{ $order['order_info']->fio->lastname }}
    </p>

    <hr>

    <span>Cпособ оплаты:</span>
    <p>
        {{ $order['order_info']->payment_info }}
    </p>

    <a href="{{ route('AdminDisplayOrders') }}">Назад</a>

@endsection
