{{-- @php dump($chrst); @endphp --}}

<div class="prdch  <? if ($class) {
    echo $class;
} ?>">


    <div class="prdch_wrap">
        <div class="prdch_item">
            <div class="prdch_name">
                    <span>
                       Цвет
                    </span>
            </div>
            <div class="prdch_val">
                @if(isset($chrst->color))
                    {{ $chrst->color }}
                @else
                    Черный
                @endif
            </div>
        </div>

        @if($chrst->printertype === 'Принтер струйный')
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Емкость (мл)
                    </span>
                </div>
                <div class="prdch_val">
                    5 мл
                </div>
            </div>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Основа
                    </span>
                </div>
                <div class="prdch_val">
                    Пигментные
                </div>
            </div>
        @elseif($chrst->printertype === 'Принтер лазерный')
            @if(isset($chrst->Ресурс))
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Ресурс страниц
                    </span>
                </div>
                <div class="prdch_val">
                    <span>{{ intval($chrst->Ресурс) }} текстовых страниц А4</span>
                </div>
            </div>
            @endif
        @endif

        @if($chrst->printertype === 'Принтер матричный')
            @if(isset($chrst->Ресурс))
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Ресурс
                    </span>
                </div>
                <div class="prdch_val">
                        <span>{{ $chrst->Ресурс }}</span>
                </div>
            </div>
            @endif
        @endif

        <div class="prdch_item">
            <div class="prdch_name">
                        <span>
                           Гарантия
                        </span>
            </div>
            <div class="prdch_val">
                <span>12 мес</span>
            </div>
        </div>
        @if(isset($chrst->Вес) && isset($chrst->Длина) && isset($chrst->Высота))
        <div class="prdch_item">
            <div class="prdch_name">
                    <span>
                       Размер в упаковке (ШхДхВ)мм
                    </span>
            </div>
            <div class="prdch_val">
                    <span>{{ $chrst->Ширина }} х {{ $chrst->Длина }} x {{ $chrst->Высота }}</span>
            </div>
        </div>
        @endif
        @if(isset($chrst->Вес))
        <div class="prdch_item">
            <div class="prdch_name">
                    <span>
                       Вес в упаковке (кг.)
                    </span>
            </div>
            <div class="prdch_val">
                    <span>{{ $chrst->Вес }}</span>
            </div>
        </div>
        @endif
        <div class="prdch_item">
            <div class="prdch_name">
                    <span>
                       Страна производитель
                    </span>
            </div>
            <div class="prdch_val">
                <span>Китай</span>
            </div>
        </div>
    </div>
</div>
