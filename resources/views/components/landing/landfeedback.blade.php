<div class="pfitem" style="border-bottom: none; max-width: 970px; margin-bottom: 100px;">
    <div class="pfitem_wrap">

        <div class="pfitem_wrap-item">
            <div class="pfitem_btn_all">
                @include('components.btn.text_btn', [ 'class' => 'prdet_btn action_btn', 'text' => 'Все отзывы'])
            </div>
            <div class="pfitem_wrap-item_ava"></div>
        </div>

        <div class="pfitem_wrap-item">
            <div class="pfitem_wrap-item_head">
                <div class="pfitem_wrap-item_head-text">
                    <span class="pfitem_best">Лучший отзыв</span>
                    <span>Волан де морт</span>
                </div>
                {{--<div class="pfitem_wrap-item_head-date">{{ $feed->created_at }}</div>--}}
                <div class="pfitem_wrap-item_head-date">12.09.2019</div>
            </div>

            <div class="pfitem_wrap-item_summary">
                <div class="pfitem_wrap-item_summary-icon"></div>
                <div class="pfitem_wrap-item_summary-total"><span>Рекомендует</span></div>
            </div>

            <div class="pfitem_wrap-item_row">
                <div class="pfitem_wrap-item_row-head"><span>Плюсы</span></div>
                <div class="pfitem_wrap-item_row-desc"><span>Хорошо печатает</span></div>
                {{--<div class="pfitem_wrap-item_row-desc"><span>@php if($feed->plus != 'false') { echo $feed->plus; } else { echo 'Хорошо печатает'; } @endphp</span></div>--}}
            </div>

            <div class="pfitem_wrap-item_row">
                <div class="pfitem_wrap-item_row-head"><span>Минусы</span></div>
                <div class="pfitem_wrap-item_row-desc"><span>Не найдены</span></div>
                {{--<div class="pfitem_wrap-item_row-desc"><span>@php if($feed->minus != 'false') { echo $feed->plus; } else { echo 'Не найдены'; } @endphp</span></div>--}}
            </div>

            <div class="pfitem_wrap-item_row">
                <div class="pfitem_wrap-item_row-head" style="padding-top: 10px;"><span>Отзыв</span></div>
                <div class="pfitem_wrap-item_row-desc"><span>В целом покупкой доволен. За свои деньги крепкий середнячок. Покупал ради изображения - по нему все отлично. На заклинания патронуса хорошо реагирует. Напечатал 100 000 фотографий с розыском Гарри Поттера и развесил по всему Хогварду.</span></div>
                {{--<div class="pfitem_wrap-item_row-desc"><span>{{ $feed->feedback }}</span></div>--}}
            </div>

        </div>
    </div>
</div>
