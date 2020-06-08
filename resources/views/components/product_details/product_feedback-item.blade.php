@foreach($feedbacks as $feed)

    <div class="pfitem <? if($class) { echo $class; } ?>">
        <div class="pfitem_wrap">
            <div class="pfitem_wrap-item">
                <div class="pfitem_wrap-item_ava"></div>
            </div>

            <div class="pfitem_wrap-item">
                <div class="pfitem_wrap-item_head">
                    <div class="pfitem_wrap-item_head-text"><span>Волан де морт</span></div>
                    <div class="pfitem_wrap-item_head-date">{{ $feed->created_at }}</div>
                </div>

                <div class="pfitem_wrap-item_summary">
                    <div class="pfitem_wrap-item_summary-icon"></div>
                    <div class="pfitem_wrap-item_summary-total"><span>Рекомендует</span></div>
                </div>

                <div class="pfitem_wrap-item_row">
                    <div class="pfitem_wrap-item_row-head"><span>Плюсы</span></div>
                    <div class="pfitem_wrap-item_row-desc"><span>@php if($feed->plus != 'false') { echo $feed->plus; } else { echo 'Хорошо печатает'; } @endphp</span></div>
                </div>

                <div class="pfitem_wrap-item_row">
                    <div class="pfitem_wrap-item_row-head"><span>Минусы</span></div>
                    <div class="pfitem_wrap-item_row-desc"><span>@php if($feed->minus != 'false') { echo $feed->plus; } else { echo 'Не найдены'; } @endphp</span></div>
                </div>

                <div class="pfitem_wrap-item_row">
                    <div class="pfitem_wrap-item_row-head"><span>Отзыв</span></div>
                    <div class="pfitem_wrap-item_row-desc"><span>{{ $feed->feedback }}</span></div>
                </div>

            </div>
        </div>
    </div>
@endforeach
