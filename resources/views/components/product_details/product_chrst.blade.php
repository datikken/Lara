@php #dump($chrst); @endphp

<div class="prdch  <? if($class) { echo $class; } ?>">
    <div class="prdch_wrap">
        <? if(isset($chrst->col)) { ?>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>Цветность печати</span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->col }}</span>
                </div>
            </div>
        <? } ?>

        <? if(isset($chrst->printertype )) { ?>
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>Технология печати</span>
                </div>
                <div class="prdch_val">
                    <span>{{ $chrst->printertype }}</span>
                </div>
            </div>
        <? } ?>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Размещение</span>
            </div>
            <div class="prdch_val">
                <span>настольный</span>
            </div>
        </div>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Область применения</span>
            </div>
            <div class="prdch_val">
                <span>персональный</span>
            </div>
        </div>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Максимальный формат</span>
            </div>
            <div class="prdch_val">
                <span>A4</span>
            </div>
        </div>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Автоматическая двусторонняя печать</span>
            </div>
            <div class="prdch_val">
                <span>есть</span>
            </div>
        </div>

        <div class="prdch_item">
            <div class="prdch_name">
                <span>Печать фотографий</span>
            </div>
            <div class="prdch_val">
                <span>есть</span>
            </div>
        </div>


        <div class="prdch_item">
            <div class="prdch_name">
                <span>Печать без полей</span>
            </div>
            <div class="prdch_val">
                <span>есть</span>
            </div>
        </div>


        <div class="prdch_item">
            <div class="prdch_name">
                <span>Максимальное разрешение для ч/б печати</span>
            </div>
            <div class="prdch_val">
                <span>4800x1200 dpi</span>
            </div>
        </div>

    </div>
</div>
