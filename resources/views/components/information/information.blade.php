

<div class="info">
    <div class="info_content">

        @foreach($info as $inf)
            <div class="info_content-item" id="{{ $inf['category'] }}">
                <div class="info_content-item_inner">
                    <div class="info_content-item_inner-icon payment">
                        <img src="{{ Storage::url('information_icons/' . $inf['image']) }}"/>
                    </div>
                    <div class="info_content-item_inner-heading"> {{ $inf['category'] }} </div>
                </div>

                <div class="info_menu">
                    <div class="info_menu-wrap">
                        <div class="info_menu-wrap_item" data-type="fizik">
                            <span class="info_menu-wrap_item-text">Физическим лицам</span>
                        </div>
                        <div class="info_menu-wrap_item info_active" data-type="urik">
                            <span class="info_menu-wrap_item-text">Юридическим лицам</span>
                        </div>
                    </div>
                </div>

                <div class="info_content-item_inner concrete_content urik_content">
                    <div class="info_content-item_inner-desc">{{ $inf['urik_title'] }}</div>

                    <div class="info_content-item_inner-text">
                        <span>{{$inf['urik_text']}}</span>
                    </div>
                </div>

                <div class="info_content-item_inner concrete_content fizik_content invisible">
                    <div class="info_content-item_inner-desc">{{ $inf['fizik_title'] }}</div>

                    <div class="info_content-item_inner-text">
                        <span>{{$inf['fizik_text']}}</span>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
