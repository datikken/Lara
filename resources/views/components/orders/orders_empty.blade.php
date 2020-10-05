
<div class="empty_cart">
    <h2 class="empty_cart-head">У вас еще нет заказов.</h2>
    <p class="empty_cart-paragraph">Для создания заказа, вы можете воспользоваться поиском или каталогом товаров.</p>
    <a href="{{route('allProducts')}}">
        @include('components.btn.text_btn', [ 'class' => 'empty_cart-btn magic_btn', 'text' => 'перейти в каталог'])
    </a>
</div>
