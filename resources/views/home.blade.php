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
                    <div class="dash_left-wrap_item-text">
                        <span>Выйти</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="dash_right">
            <div class="dash_right-wrap">
                <div class="dash_right-wrap-head">
                    <span><b>Здравствуйте!</b> Мы рады видеть вас в вашем личном кабинете!</span>
                </div>
                <div class="dash_right-wrap-text">
                    <p>Для удобства пользования вашим личным кабинетом, вы можете посмотреть свои <a href="#">заказы</a>,
                        <a href="#">заполнить профиль</a> или зайти в <a href="#">адреса</a></p>
                </div>
                <div class="dash_right-wrap-text">
                    <p>Мы заботимся об окружающей среде и поэтому разработали програму утилизации старых картриджей, за которые вы получаете бонусы</p>
                </div>


                <div class="dash_right_sale">
                    <div class="dash_right_sale-item" style="background-image: url('./images/dash/dash_sdav.svg')"></div>
                    <div class="dash_right_sale-item" style="background-image: url('./images/dash/dash_saved.svg')"></div>
                    <div class="dash_right_sale-item" style="background-image: url('./images/dash/dash_bonuses.svg')"></div>
                </div>

            </div>


        </div>
    </div>

@endsection
