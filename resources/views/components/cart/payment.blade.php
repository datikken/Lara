<div class="payment">
    <div class="payment_wrap">
        <div class="payment_wrap-head">
            <h1>СПОСОБ ОПЛАТЫ</h1>
        </div>

        <div class="payment_wrap-form">
            <div class="payment_wrap-form_group">
                <label for="payment_type">При получении</label>

                <div class="payment_wrap-form_group-inner">
                    @include('components.checkbox.simple_check', ['name' => 'payment_type-offline'])
                    <span>Наличными или банковской картой</span>
                </div>
            </div>
            <div class="payment_wrap-form_group">
                <label for="payment_type">Онлайн</label>

                <div class="payment_wrap-form_group-inner">
                    @include('components.checkbox.simple_check', ['name' => 'payment_type-online'])
                    <span>Картами Visa, Mastercard, Maestro</span>
                </div>
            </div>



<div class="payment_wrap-form_inner">
    <div class="payment_wrap-form_group">
        <div class="payment_wrap-form_group-inner">
            <label for="payment_type" class="cart_num">Номер карты</label>
            <input type="text" name="card_num" placeholder="Введите номер карты">
        </div>
    </div>

    <div class="payment_wrap-form_group">
        <div class="payment_wrap-form_group-last row_alignment">
            <input type="text" class="invisible" name="year">
            <input type="text" class="invisible" name="month">

            <div class="row_alignment-inner">
                {{--<label for="srok">Срок действия</label>--}}
                <div class="payment_wrap-form_group-date">
                    <div class="year">
                        <span class="year_label">Год</span>
                        <span class="arrow" style="background-image: url('/images/icons/arrow_right.svg')"></span>

                        <ul class="invisible">
                            @for ($i = 2010; $i < 2030; $i++)
                                <li>{{ $i }}</li>
                            @endfor
                        </ul>

                    </div>
                </div>

                <div class="payment_wrap-form_group-date">
                    <div class="month">
                        <span class="month_label">Месяц</span>
                        <span class="arrow" style="background-image: url('/images/icons/arrow_right.svg')"></span>

                        <ul class="invisible">
                            @for ($i = 1; $i < 13; $i++)
                                <li>{{ $i }}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>

            <input class="payment_wrap-form_group-cvv row_alignment-inner" type="text" placeholder="Введите номер" name="cvv"/>

        </div>

    </div>

    <div class="payment_wrap-form_group">
        <label for="card_name">Имя и фамилия владельца карты</label>
        <input type="text" class="invisible" name="card_name" placeholder="введите  имя и фамилию владельца карты">
    </div>
</div>




            <button type="submit" class="proceedPayment" data-url="{{ route('proceedPayment') }}">
                @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn action_btn', 'text' => 'подтвердить'])
            </button>

        </div>
    </div>
</div>
