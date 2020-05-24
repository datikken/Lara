<div class="treq">
    <div class="treq_wrap">
        <div class="treq_head">
            <h1 class="treq_heading">Отследить ваш заказ</h1>
            <span class="treq_desc">Для отслеживания вашего заказа, пожалуйста, введите ваш идентификатор заказа в поле ниже</span>
        </div>

        <form action="{{route('checkOrderStatus')}}" method="get" class="treq_form">
            <div class="treq_inputs">
                <div class="treq_form_gr">
                    <label for="numb">Номер заказа</label>
                    <input type="text" name="numb" placeholder="Введите номер заказа из письма подтверждения заказа">
                </div>
                <div class="treq_form_gr">
                    <label for="email">Электронный адрес</label>
                    <input type="text" name="email" placeholder="Адрес электронной почты, использованный при оформлении заказа">
                </div>
            </div>

            <button type="submit">
                @include('components.btn.text_btn', [ 'class' => 'treq_form_btn', 'text' => 'продолжить'])
            </button>

        </form>
    </div>
</div>
