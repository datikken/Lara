@php #dump($chrst); @endphp

<div class="prdch  <? if ($class) {
    echo $class;
} ?>">
    <div class="prdch_wrap">

        {{--{{  dd($chrst) }}--}}


            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Цвет
                    </span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->color }}</span>
                </div>
            </div>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                       Ресурс страниц
                    </span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->Ресурс }} текстовых страницы А4</span>
                </div>
            </div>
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
