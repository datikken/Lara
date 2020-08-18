@php #dump($chrst); @endphp

<div class="prdch  <? if($class) { echo $class; } ?>">
    <div class="prdch_wrap">

        <? if(isset($chrst->col)) { ?>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>Цвет</span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->col }}</span>
                </div>
            </div>
        <? } ?>

        <? if(isset($chrst->res)) { ?>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>Ресурс страниц</span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->res }} текстовых страницы А4</span>
                </div>
            </div>
        <? } ?>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Гарантия</span>
            </div>
            <div class="prdch_val">
                <span>12 мес</span>
            </div>
        </div>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Размер в упаковке (Ш х Г х В)мм</span>
            </div>
            <div class="prdch_val">
                <span>{{ $chrst->wide }} х {{ $chrst->long }} х {{ $chrst->hight }}</span>
            </div>
        </div>

        <? if(isset($chrst->res)) { ?>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>Вес в упаковке (кг.)</span>
                </div>
                <div class="prdch_val">
                    <span> {{ $chrst->net }}</span>
                </div>
            </div>
        <? } ?>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Страна производитель</span>
            </div>
            <div class="prdch_val">
                <span>Китай</span>
            </div>
        </div>


    </div>
</div>
