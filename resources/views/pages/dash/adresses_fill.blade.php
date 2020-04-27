@extends('layouts.dash')

@section('center')

    <div class="fadress">
        <div class="fadress_wrap">
            <form action="#" class="fadress_wrap-form" method="get">
                <div class="fadress_wrap-form_group first_row">
                    <div class="fadress_wrap-form_group_inner">
                        <label for="country">Страна</label>
                        <input type="text" name="country" placeholder="Выберете страну">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="city">Город</label>
                        <input type="text" name="city" placeholder="Введите город">
                    </div>
                </div>

                <div class="fadress_wrap-form_group second_row">
                    <div class="fadress_wrap-form_group_inner">
                        <label for="street">Улица</label>
                        <input type="text" name="street" placeholder="Введите улицу">
                    </div>
                </div>

                <div class="fadress_wrap-form_group third_row">
                    <div class="fadress_wrap-form_group_inner">
                        <label for="home">Дом</label>
                        <input type="text" name="home" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="wing">Корпус</label>
                        <input type="text" name="wing" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="building">Строение</label>
                        <input type="text" name="building" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="porch">Подьезд</label>
                        <input type="text" name="porch" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="intercom">Домофон</label>
                        <input type="text" name="intercom" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="floor">Этаж</label>
                        <input type="text" name="floor" placeholder="номер">
                    </div>
                    <div class="fadress_wrap-form_group_inner">
                        <label for="flat">Офис/Склад</label>
                        <input type="text" name="flat" placeholder="номер">
                    </div>
                </div>

                @include('components.btn.text_btn', [ 'class' => 'fadress_wrap-form-btn', 'text' => 'Сохранить адрес'])

            </form>
        </div>
    </div>

@endsection
