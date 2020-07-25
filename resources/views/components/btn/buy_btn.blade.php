<div class="animated_btn product_wrapper-item_btn <?php if(isset($text)) echo 'text_buy-btn' ?>">
    <div class="desktop-hide">
        <div class="product_wrapper-item_price-item">Купить</div>
    </div>
    <img src='/images/icons/cart.svg' alt="cart"/>
    @if(isset($text))
        <span>{{$text}}</span>
    @endif
</div>
