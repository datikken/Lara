@extends('layouts.admin')

@section('center')

    <h1 class="bd-title mt-2" id="content">Данные</h1>

    @if(!$order['order_info']->cart_pickup)
        <h3>Доставка</h3>

        <div class="bd-highlight">
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

    @else
        <div class="bd-highlight">
            <h3>Самовывоз</h3>
            <div class="mr-3">
                <span>Название:</span>
                <p>
                    {{ $order['order_info']->cart_pickup->name  }}
                </p>
            </div>
            <div class="mr-3">
                <span>Адрес:</span>
                <p>
                    {{ $order['order_info']->cart_pickup->adr  }}
                </p>
            </div>
        </div>
    @endif

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
