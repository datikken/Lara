<div class="cart_check">
    <form class="cart_check-wrap">

        <div class="cart_check-wrap_head">
            <h1>Получатель заказа</h1>
        </div>

        <div class="cart_check-wrap_item">
            <div class="cart_check-wrap_item-group">
                <label for="name">Имя</label>
                <input type="text" name="name" />
            </div>
            <div class="cart_check-wrap_item-group">
                <label for="lastname">Фамилия</label>
                <input type="text" name="lastname" />
            </div>
        </div>

        <div class="cart_check-wrap_item">
            <div class="cart_check-wrap_item-group">
                <label for="name">Телефон</label>
                <input type="text" name="name" />
            </div>
            <div class="cart_check-wrap_item-group">
                @include('components.btn.text_btn', [ 'class' => 'cart_check-wrap_item-group_btn', 'text' => 'продолжить'])
            </div>
        </div>

        <div class="cart_check-wrap_item">
            <div class="cart_check-wrap_item-group">
                <input type="text" name="name" />
                <label for="name">Сохранить данные</label>
            </div>
        </div>

    </form>
</div>