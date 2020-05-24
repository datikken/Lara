@extends('layouts.cartProducts')
@section('center')
    <div class="cart_check-wrapper">
        <div class="cart_check">
            <div class="cart_check-wrap" data-href="{{ route('setCustomerFio') }}">
                @csrf
                <div class="cart_check-wrap_head">
                    <h1>Получатель заказа</h1>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group">
                        <label for="firstname">Имя <span>*</span></label>
                        <input type="text" name="firstname" />
                        <label for="required" class="invisible">Поле имя обязательно к заполнению</label>
                    </div>
                    <div class="cart_check-wrap_item-group">
                        <label for="lastname">Фамилия <span>*</span></label>
                        <input type="text" name="lastname" />
                        <label for="required" class="invisible errorLabel">Поле фамилия обязательно к заполнению</label>
                    </div>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group">
                        <label for="tel">Телефон <span>*</span></label>
                        <input type="text" name="tel" placeholder="+7 (___) ___ - __ - __" class="masked"/>
                        <label for="required" class="invisible errorLabel">Поле телефон обязательно к заполнению</label>
                    </div>
                    <button type="submit" class="cart_check-wrap_item-group cart_check-button">
                        @include('components.btn.text_btn', [ 'class' => 'cart_check-wrap_item-group_btn', 'text' => 'продолжить'])
                    </button>
                </div>

                <div class="cart_check-wrap_item">
                    <div class="cart_check-wrap_item-group checkbox">
                        @include('components.checkbox.simple_check', ['name' => 'save'])
                        <label for="save">Сохранить данные</label>
                    </div>
                </div>

            </div>
        </div>
        @include('components.cart.order_list')
    </div>
@endsection
