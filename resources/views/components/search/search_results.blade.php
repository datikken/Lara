<div class="sres as-none">
    <div class="sres_wrap">

        @foreach($products as $product)
            <div class="sres_head">
                <div class="sres_head_item">
                    <span>
                        Цвет
                    </span>
                </div>
                <div class="sres_head_item">

                </div>
                <div class="sres_head_item">

                </div>
            </div>

            <div class="sres_item">
                <div class="sres_col">

                    <span class="sres_col_item sres_color"></span>
                </div>
                <div class="sres_col">
                    <span class="sres_col_item">{{ $product->photo }}</span>
                </div>
                <div class="sres_col">
                    <span class="sres_col_item">HP LaserJet</span>
                    <span class="sres_col_item">P1102 1102w</span>
                </div>
            </div>

        @endforeach


    </div>
</div>
