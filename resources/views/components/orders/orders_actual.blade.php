
{{--@php dump($orders_actual); @endphp--}}

<div class="actorders">
    <div class="actorders_wrap">
        <div class="actorders_head">
            <span>Действующие заказы</span>
        </div>

        <div class="actorders_table">

            <div class="actorders_table_head">
                <div class="actorders_table_head_item"><span>Дата заказа</span></div>
                <div class="actorders_table_head_item"><span>Номер заказа</span></div>
                <div class="actorders_table_head_item"><span>Сумма заказа</span></div>
                <div class="actorders_table_head_item"><span>Наименование(юр лицо)</span></div>
                <div class="actorders_table_head_item"><span>Статус отгрузки</span></div>
                <div class="actorders_table_head_item"><span>Статус оплаты</span></div>
            </div>

            <div class="actorders_items">
                @foreach($orders_actual as $order)
                        <div class="actorders_table_item">
                            <div class="actorders_table_item_inner"><span>{{$order->date}}</span></div>
                            <div class="actorders_table_item_inner"><span>{{$order->id}}</span></div>
                            <div class="actorders_table_item_inner"><span>{{$order->price}} руб.</span></div>
                            <div class="actorders_table_item_inner"><span>ООО “Рога и копыта”</span></div>

                            <?
                                switch ($order->status) {
                                    case 'on_hold':
                                        echo '<div class="actorders_table_item_inner"><span>Отгружен</span></div>';
                                        break;
                                    case 'on_delivery':
                                        echo '<div class="actorders_table_item_inner"><span>Передан в доставку</span></div>';
                                        break;
                                    case 'delivery_progress':
                                        echo '<div class="actorders_table_item_inner"><span>Не отгружен</span></div>';
                                        break;
                                    case 'arrived':
                                        echo '<div class="actorders_table_item_inner"><span>Отгружен</span></div>';
                                        break;
                                }
                            ?>

                            <?
                                switch ($order->status) {
                                    case 1:
                                        echo '<div class="actorders_table_item_inner"><span>Оплачен</span></div>';
                                        break;
                                    case 0:
                                        echo '<div class="actorders_table_item_inner"><span>Неоплачен</span></div>';
                                        break;
                                    }
                            ?>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
