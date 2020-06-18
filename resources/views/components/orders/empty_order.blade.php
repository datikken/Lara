<div class="empty_order">
    <h1 class="empty_order_head">Ничего не найдено.</h1>
    <p class="empty_order_paragraph">
        Для добавления товаров в корзину,<br/> вы можете воспользоваться поиском
        или каталогом товаров
    </p>
    <a href="{{route('allProducts')}}">
        @include('components.btn.text_btn', [ 'class' => 'empty_cart-btn', 'text' => 'перейти в каталог'])
    </a>
</div>
