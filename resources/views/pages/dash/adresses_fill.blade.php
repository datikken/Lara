@extends('layouts.dash')

@section('center')

    <div class="fadress">
        <div class="fadress_wrap">
            <form action="/home/fillAdresses" class="fadress_wrap-form" method="get">
                {{csrf_field()}}
                @foreach($address as $adr)
                    <div class="fadress_wrap-form_group first_row">
                        <div class="fadress_wrap-form_group_inner">
                            <label for="country">Страна</label>
                            <input type="text" name="country" placeholder="Выберете страну" value="{{ $adr->country }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="city">Город</label>
                            <input type="text" name="city" placeholder="Введите город" value="{{ $adr->city }}">
                        </div>
                    </div>

                    <div class="fadress_wrap-form_group second_row">
                        <div class="fadress_wrap-form_group_inner">
                            <label for="street">Улица</label>
                            <input type="text" name="street" placeholder="Введите улицу" value="{{ $adr->street }}">
                        </div>
                    </div>

                    <div class="fadress_wrap-form_group third_row">
                        <div class="fadress_wrap-form_group_inner">
                            <label for="home">Дом</label>
                            <input type="text" name="home" placeholder="номер" value="{{ $adr->home }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="wing">Корпус</label>
                            <input type="text" name="wing" placeholder="номер" value="{{ $adr->wing }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="building">Строение</label>
                            <input type="text" name="building" placeholder="номер" value="{{ $adr->building }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="porch">Подьезд</label>
                            <input type="text" name="porch" placeholder="номер" value="{{ $adr->porch }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="intercom">Домофон</label>
                            <input type="text" name="intercom" placeholder="номер" value="{{ $adr->intercom }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="floor">Этаж</label>
                            <input type="text" name="floor" placeholder="номер" value="{{ $adr->floor }}">
                        </div>
                        <div class="fadress_wrap-form_group_inner">
                            <label for="flat">Офис/Склад</label>
                            <input type="text" name="flat" placeholder="номер" value="{{ $adr->flat }}">
                        </div>
                    </div>

                    <button type="submit">
                        @include('components.btn.text_btn', [ 'class' => 'fadress_wrap-form-btn', 'text' => 'Сохранить адрес'])
                    </button>
                @endforeach

            </form>
        </div>
    </div>

@endsection
