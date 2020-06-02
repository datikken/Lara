{{--@php dump($orders_history); @endphp--}}

<div class="history">
    <div class="history_wrapper">
        <div class="history_wrapper-item">
            <div class="history_wrapper-item_heading">
                <span class="history_wrapper-item_heading-text">История заказов</span>
            </div>
        </div>
        <div class="history_wrapper-item">
            <div class="history_wrapper-item_row">
                <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                    <span class="history_wrapper-item_row-item_text">Дата заказа</span>
                </div>
                <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                    <span class="history_wrapper-item_row-item_text">Номер заказа</span>
                </div>
                <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                    <span class="history_wrapper-item_row-item_text">
<? if($user->face === 'fizik') {?>
<? echo 'Физ. лицо'; } else { echo 'Юр. лицо'; }?>
                    </span>
                </div>
                <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                    <span class="history_wrapper-item_row-item_text">Сумма</span>
                </div>
            </div>

            @foreach($orders_history as $order)
                <div class="history_wrapper-item_row">
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">{{ $order->date }}</span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">{{ $order->id }}</span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">
<? if($user->face === 'fizik') {?>
<? echo $user->email; } else { echo $user->name; }?>
                        </span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">{{ $order->price }}</span>
                    </div>
                </div>
            @endforeach

            <div class="history_wrapper-item_row">
                <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                    <span class="history_wrapper-item_row-item_text">№ заказа</span>
                </div>
                <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                    <span class="history_wrapper-item_row-item_text">Наименование</span>
                </div>

                <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                    <span class="history_wrapper-item_row-item_text">Количество</span>
                </div>
                <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                    <span class="history_wrapper-item_row-item_text">Стоимость</span>
                </div>
                <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                    <span class="history_wrapper-item_row-item_text">Сумма</span>
                </div>
            </div>

            @foreach($last_order as $item)
                <div class="history_wrapper-item_row">
                    <div class="history_wrapper-item_row-info">
                        <span class="history_wrapper-item_row-item_val">{{ $last_order->id }}</span>
                    </div>
                    <div class="history_wrapper-item_row-info">
                        <span class="history_wrapper-item_row-item_val">{{ $item->item_name }}</span>
                    </div>

                    <div class="history_wrapper-item_row-info">
                        <span class="history_wrapper-item_row-item_val">{{ $item->quantity }}</span>
                    </div>
                    <div class="history_wrapper-item_row-info">
                        <span class="history_wrapper-item_row-item_val">{{ $item->item_price }}</span>
                    </div>
                    <div class="history_wrapper-item_row-info">
                        <span class="history_wrapper-item_row-item_val">@php echo $item->quantity * $item->item_price; @endphp</span>
                    </div>
                </div>
            @endforeach

            <div class="history_wrapper-item_row">
                <a href="{{ route('repeatOrder', ['id' => $last_order->id ]) }}" class="history_wrapper-item_row-total-cta">
                    <span class="history_wrapper-item_row-total-cta_content">Положить в корзину</span>
                </a>
                <div class="history_wrapper-item_row-total">
                    <div class="history_wrapper-item_row-total_content">
                        <span class="history_wrapper-item_row-total_content-title">Итого:</span>
                        <span class="history_wrapper-item_row-total_content-value">{{ $item->quantity }} ед.</span>
                    </div>
                </div>
                <div class="history_wrapper-item_row-total">
                    <div class="history_wrapper-item_row-total_content" style="padding-left: 10px;">
                        <span class="history_wrapper-item_row-total_content-title">Итого:</span>
                        <span class="history_wrapper-item_row-total_content-value">{{ $last_order_total[0]->price }} р.</span>
                    </div>

                    <div class="history_wrapper-item_row-total_btns">
                        <div class="history_wrapper-item_row-total_btns-btn"><span>Закрыть</span></div>
                        <div class="history_wrapper-item_row-total_btns-btn"><span>Повторить заказ</span></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
