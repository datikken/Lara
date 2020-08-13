@foreach($feedbacks as $ind=>$feed)
    <div class="pfitem <? if($ind != 0) { echo $class; } ?>">
        <div class="pfitem_wrap">
            <div class="pfitem_wrap-item">
                <div class="pfitem_wrap-item_ava">

<? if($feed->user_avatar) { ?>
    <img src="{{Storage::disk('local')->url('user_avatars/' . $feed->user_avatar )}}" alt="Logo">
<? } else { ?>
    <img src="/images/icons/avatar.svg" alt="">
<? } ?>

                </div>
            </div>

            <div class="pfitem_wrap-item">

                <? if($ind === 0) { ?>
                    <div class="pfitem_wrap-item_head-best"><span>Лучший отзыв</span></div>
                <? } ?>

                <div class="pfitem_wrap-item_head">

                    <div class="pfitem_wrap-item_head_inner">
                        <div class="pfitem_wrap-item_head-text"><span>{{ $feed->name }}</span></div>
                        <div class="pfitem_wrap-item_head-date">{{ $feed->created_at }}</div>
                    </div>

                    <? if($ind === 0) { ?>
                        @include('components.btn.text_btn', [ 'class' => 'show_all_btn', 'text' => 'Все отзывы'])
                    <? } ?>

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
