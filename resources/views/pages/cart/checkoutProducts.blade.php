@extends('layouts.cartProducts')

@section('center')
    <div class="cart_check-wrapper">
        <div class="cart_check">
            <form class="cart_check-wrap" method="POST" action="{{ route('setCustomerFio') }}">

                {{ csrf_field() }}

                <div class="cart_check-wrap_head">
                    <h1>Получатель заказа</h1>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group">
                        <label for="firstname">Имя *</label>
                        <input type="text" name="firstname" />
                        <label for="required">Поле имя обязательно к заполнению</label>
                    </div>
                    <div class="cart_check-wrap_item-group">
                        <label for="lastname">Фамилия *</label>
                        <input type="text" name="lastname" />
                        <label for="required">Поле фамилия обязательно к заполнению</label>
                    </div>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group">
                        <label for="tel">Телефон *</label>
                        <input type="text" name="tel" placeholder="+7 (___) ___ - __ - __"/>
                        <label for="required">Поле телефон обязательно к заполнению</label>
                    </div>
                    <button type="submit" class="cart_check-wrap_item-group">
                        @include('components.btn.text_btn', [ 'class' => 'cart_check-wrap_item-group_btn', 'text' => 'продолжить'])
                    </button>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group checkbox">
                        <input type="checkbox" name="save" />
                        @include('components.checkbox.simple_check')
                        <label for="save">Сохранить данные</label>
                    </div>
                </div>

            </form>
        </div>

        <div class="order_list">
            <div class="order_list-wrap">
                <div class="order_list-wrap_item">
                    <div class="order_list-wrap_item-head">
                        <h1>Ваш заказ</h1>
                    </div>
                </div>

                <div class="order_list-wrap_inner">
                    <div class="order_list-wrap_inner-row">
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-head">Наимениование</span>
                        </div>
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-head">Стоимость</span>
                        </div>
                    </div>

                    @foreach (Session::get('cart')->items as $item)
                        <div class="order_list-wrap_inner-row">
                            <div class="order_list-wrap_inner-row_item">
                                <span class="order_list-wrap_inner-row_item-text">{{ $item['data']['name'] }}</span>
                            </div>
                            <div class="order_list-wrap_inner-row_item">
                                <span class="order_list-wrap_inner-row_item-text"> {{ $item['price'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="order_list-wrap_footer">
                    <div class="order_list-wrap_footer-row">
                        <div class="order_list-wrap_footer-row_item">
                            <span>Сумма</span>
                        </div>
                        <div class="order_list-wrap_footer-row_item">
                            <span>
                                @php
                                    if(Session::get('cart')) echo Session::get('cart')->totalPrice;
                                @endphp руб.
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection