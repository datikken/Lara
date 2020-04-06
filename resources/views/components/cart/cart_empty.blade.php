<?php #dump($cartItem)?>

<div class="cart_wrap-item_inner-table_row">
    <h2>Ваша корзина еще пуста</h2>
    <p>Для удобства наполнения корзины, Вы можете воспользоваться поиском
        или каталогом товаров</p>
    @include('components.btn.text_btn', [ 'class' => 'flat_btn', 'text' => 'перейти в каталог'])
</div>