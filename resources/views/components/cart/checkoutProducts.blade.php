<div class="cart_check">
    <form class="cart_check-wrap">

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