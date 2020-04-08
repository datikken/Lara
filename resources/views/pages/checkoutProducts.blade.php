<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printers</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
@extends('layouts.index')

@section('center')
    <div class="cart_check-wrapper">
        <div class="cart_check">
            <form class="cart_check-wrap">

                {{ csrf_field() }}

                <div class="cart_check-wrap_head">
                    <h1>Получатель заказа</h1>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group">
                        <label for="name">Имя *</label>
                        <input type="text" name="name" />
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
                        <label for="name">Телефон *</label>
                        <input type="text" name="name" placeholder="+7 (___) ___ - __ - __"/>
                        <label for="required">Поле телефон обязательно к заполнению</label>
                    </div>
                    <div class="cart_check-wrap_item-group">
                        @include('components.btn.text_btn', [ 'class' => 'cart_check-wrap_item-group_btn', 'text' => 'продолжить'])
                    </div>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group checkbox">
                        <input type="checkbox" name="save" />
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

                    <div class="order_list-wrap_inner-row">
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">Тонер-картридж TC-H85A</span>
                        </div>
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">12600 руб.</span>
                        </div>
                    </div>

                    <div class="order_list-wrap_inner-row">
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">Тонер-картридж TC-H85A</span>
                        </div>
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">12600 руб.</span>
                        </div>
                    </div>
                    <div class="order_list-wrap_inner-row">
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">Тонер-картридж TC-H85A</span>
                        </div>
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">12600 руб.</span>
                        </div>
                    </div>
                    <div class="order_list-wrap_inner-row">
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">Тонер-картридж TC-H85A</span>
                        </div>
                        <div class="order_list-wrap_inner-row_item">
                            <span class="order_list-wrap_inner-row_item-text">12600 руб.</span>
                        </div>
                    </div>

                </div>

                <div class="order_list-wrap_footer">
                    <div class="order_list-wrap_footer-row">
                        <div class="order_list-wrap_footer-row_item">
                            <span>Сумма</span>
                        </div>
                        <div class="order_list-wrap_footer-row_item">
                            <span>672 837 000 руб</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

</body>
</html>