@php #dump($chrst); @endphp

<div class="prdch  <? if ($class) {
    echo $class;
} ?>">
    <div class="prdch_wrap">

        @foreach($chrst as $key=>$item)
            @if($key != 'STMC' && $key != 'Чип')
            <div class="prdch_item">
                <div class="prdch_name">
                    <span>
                        <? if($key === 'color') {
                                echo 'Цвет';
                            } else {
                                echo $key;
                            }
                        ?>
                    </span>
                </div>
                <div class="prdch_val">
                    <span>{{ $item }}</span>
                </div>
            </div>
            @endif

        @endforeach

    </div>
</div>
