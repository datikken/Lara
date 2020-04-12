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

            <div class="payment_wrap-form_group">
                <label for="payment_type">Номер карты</label>

                <div class="payment_wrap-form_group-inner">
                    <input type="text" name="card_num" placeholder="Введите номер карты">
                    <span>Картами Visa, Mastercard, Maestro</span>
                </div>
            </div>

            <div class="payment_wrap-form_group">
                <div class="payment_wrap-form_group-last">
                    <label for="srok">Срок действия</label>
                    <input type="text" class="invisible" name="year">
                    <input type="text" class="invisible" name="month">

                    <div class="payment_wrap-form_group-date">
                        <div class="year">
                            <span class="year_label">Год</span>
                            <span class="arrow"></span>
                        </div>
                     </div>

                    <div class="payment_wrap-form_group-date">
                        <div class="month">
                            <span class="year_label">Месяц</span>
                            <span class="arrow"></span>
                        </div>
                    </div>
                </div>

                <div class="payment_wrap-form_group-last">
                    <label for="srok">CVV</label>
                    <input type="text" class="invisible" name="cvv">

                    <div class="payment_wrap-form_group-cvv">
                        <div class="year">
                            <span class="year_label">Введите номер</span>
                            <span class="arrow"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment_wrap-form_group">
                <label for="card_name">Имя и фамилия владельца карты</label>
                <input type="text" class="invisible" name="card_name" placeholder="введите  имя и фамилию владельца карты">
            </div>

            <button type="submit" class="proceedPayment" data-url="{{ route('proceedPayment') }}">
                @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'подтвердить'])
            </button>

        </div>
    </div>
</div>