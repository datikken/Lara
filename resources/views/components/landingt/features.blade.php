<div class="lanfeat">
    <div class="lanfeat_wrap">
        <div class="lanfeat_head">
            <span class="lanfeat_head-item">Почему <bold>easyprint?</bold></span>
        </div>
        <div class="lanfeat_table">
            <div class="lanfeat_col">
                <div class="lanfeat_col_head"><span>Основные параметры картириджей</span></div>

                @php $items = array(
                    'Честный ресурс в соотв. STMC',
                    'Тестирование каждого картриджа',
                    'Свой персонал QC на фабрике на выпуске',
                    'Химический тонер в цв. Картриджах',
                    'Индивидуальная упаковка, EAN13',
                    'Голограмма, лаз. Гравировка (защита)',
                    'Высокое качество печати',
                    'Гарантия на весь ресурс картриджа',
                    'Товарный знак зарегистрирован',
                    'Контрактные поставки, большой склад',
                    'Процент брака по тонер к-жам',
                    'Специализированные заводы производят разные категории товаров'
                ); @endphp

                @foreach ($items as $item)
                    <div class="lanfeat_col_item">{{ $item }}</div>
                @endforeach

            </div>

            <div class="lanfeat_col">
                <div class="lanfeat_col_head">
                    <div class="lanfeat_color">
                        <div class="lanfeat_color_item"></div>
                        <div class="lanfeat_color_item"></div>
                        <div class="lanfeat_color_item"></div>
                        <div class="lanfeat_color_item"></div>
                    </div>
                    <span>EP</span>
                </div>

                @php
                    $yes = array();
                    for($i = 0; $i < 11; $i++) {
                        if($i === 10) {
                            array_push($yes, '<1% (обычно <0.5)');
                        }
                      array_push($yes, 'Да');
                    }
                @endphp

                @foreach ($yes as $ye)
                    <div class="lanfeat_col_item">{{ $ye }}</div>
                @endforeach

            </div>

            <div class="lanfeat_col">
                <div class="lanfeat_col_head"><span>Другие картриджи</span></div>

                @php
                $xx = array();
                for($i = 0; $i < 8; $i++) {
                     switch ($i) {
                        case 2:
                            array_push($xx, 'Нет');
                            break;
                        case 3:
                            array_push($xx, 'Изредка (Китайский)');
                            break;
                        case 6:
                            array_push($xx, 'Иногда, к концу ресурса падает');
                            break;
                        case 7:
                            array_push($xx, 'RMA кит. заводов до 5%');
                            break;
                    }
                  array_push($xx, 'Некоторые');
                }
                @endphp

                @foreach ($xx as $x)
                    <div class="lanfeat_col_item">{{ $x }}</div>
                @endforeach
            </div>

        </div>
    </div>
</div>
