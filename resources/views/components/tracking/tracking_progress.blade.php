{{--@php dump(empty($order[0])); @endphp--}}
<? if(!empty($order[0])) { ?>
<div class="trackp">
    <div class="trackp_progress" @php if($order[0]->status === 'on_hold') { echo 'style="width:25%"';} @endphp></div>

    <div class="trackp_item">
        <div class="trackp_item_head">
            <span>Товар на складе</span>
        </div>
        <div class="trackp_item_footer">
            <span>Адрес и телефон склада где находится товар</span>
        </div>
    </div>

    <div class="trackp_item">
        <div class="trackp_item_head">
            <span>Передан в службу доставки</span>
        </div>
        <div class="trackp_item_footer">
            <span>Адрес и телефон службы доставки где находится товар</span>
        </div>
    </div>

    <div class="trackp_item">
        <div class="trackp_item_head">
            <span>Отправлен с курьером</span>
        </div>
        <div class="trackp_item_footer">
            <span>Адрес и телефон курьера, которой осуществляет доставку</span>
        </div>
    </div>

    <div class="trackp_item">
        <div class="trackp_item_head">
            <span>Доставлен</span>
        </div>
        <div class="trackp_item_footer">
        </div>
    </div>
</div>

@include('components.tracking.tracking_feedback')

<? } else { ?>
    @include('components.orders.empty_order')
<? } ?>
