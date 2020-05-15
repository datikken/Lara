<div class="trackfeed">
    <div class="trackfeed_wrap">
        <div class="trackfeed_head">
            <span>Мы любим, когда товар доставлен надлежащего качества и в назначенный срок. Поэтому, мы будем рады вашему отклику относительно доставки.</span>
        </div>

        <label for="trackfeed" class="trackfeed_themeLabel">Выберите тему обращения</label>

        <div class="trackfeed_theme">
            <input type="text" class="invisible" name="feed_theme">

            <div class="trackfeed_feedItem feedActive">
                <span>Пожелания</span>
            </div>
            <div class="trackfeed_feedItem">
                <span>Вопрос</span>
            </div>
            <div class="trackfeed_feedItem">
                <span>Претензия</span>
            </div>
        </div>

        <form class="trackfeed_content" action="{{ route('AdminCollectTracking') }}" method="get">
            {{ csrf_field() }}
            <label for="trackfeed" class="trackfeed_label">Оставить отзыв о заказе</label>
            <textarea name="" id="" class="trackfeed_textarea" cols="30" rows="10"></textarea>
        </form>

        @include('components.btn.text_btn', [ 'class' => 'tracking_submit', 'text' => 'Отправить'])

    </div>
</div>
