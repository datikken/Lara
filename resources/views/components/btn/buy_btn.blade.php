<div class="product_wrapper-item_btn <?php if(isset($text)) echo 'text_buy-btn' ?> <?php if(isset($class)) echo $class; ?>">
    <div class="desktop-hide">
        <div class="product_wrapper-item_price-item">Купить</div>
    </div>
    <img src='/images/icons/cart.svg' alt="cart"/>
    @if(isset($text))
        <span>{{$text}}</span>
    @endif
</div>
