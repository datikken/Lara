<div class="prcp  <? if($class) { echo $class; } ?>">
    <div class="prcp_wrap">

        <div class="prcp_head">
            <div class="prcp_item">
                <span>Марка</span>
            </div>
            <div class="prcp_item">
                <span>Модель</span>
            </div>
        </div>

        @forelse($product['cape'] as $item=>$value)
            <div class="prcp_row">
                <div class="prcp_item">{{ $item }}</div>
                <div class="prcp_item">{{ $value }}</div>
            </div>
        @empty
            <div class="prcp_row">
                <div class="prcp_item">Нет информации</div>
                <div class="prcp_item">Нет информации.</div>
            </div>
        @endforelse
    </div>
</div>
