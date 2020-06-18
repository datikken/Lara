<div class="thanks  <? if($class) { echo $class; } ?>">
    <div class="thanks_wrap">
        <div class="thanks_wrap_head">
            <span>Спасибо за ваш отзыв!</span>
        </div>
        <div class="thanks_wrap_desc">
            <span>Мы обязательно его прочитаем <br/> и примем к сведению Ваше мнение</span>
        </div>
        @include('components.btn.text_btn', [ 'class' => 'thanks_wrap_btn', 'text' => 'Закрыть'])
    </div>
</div>
