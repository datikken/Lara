@extends('layouts.index')

@section('center')

    <div class="dash">
        <div class="dash_left">
            <div class="dash_left-wrap">

                <div class="dash_left-wrap_item dash_active">
                    <div class="dash_left-wrap_item-text">
                        <span>Dashboard</span>
                    </div>
                    <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_user.svg')"></div>
                </div>

                <div class="dash_left-wrap_item">
                    <div class="dash_left-wrap_item-text">
                        <span>Заказы</span>
                    </div>
                    <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_orders.svg')"></div>
                </div>

                <div class="dash_left-wrap_item">
                    <div class="dash_left-wrap_item-text">
                        <span>Адреса</span>
                    </div>
                    <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_addr.svg')"></div>
                </div>

                <div class="dash_left-wrap_item">
                    <div class="dash_left-wrap_item-text">
                        <span>Заполнить аккаунт</span>
                    </div>
                    <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_fill.svg')"></div>
                </div>

                <div class="dash_left-wrap_item dash_logout">
                    <a href="{{ route('logout') }}" class="dash_left-wrap_item-text">
                        <span>Выйти</span>
                    </a>
                </div>

            </div>
        </div>



        <div class="dash_right">
            @include('components.dash.dash_welcome')
        </div>




    </div>

@endsection
