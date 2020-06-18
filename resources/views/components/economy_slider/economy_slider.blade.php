<div class="economslider">
    <div class="economslider_wrap">

        <div class="economslider_slide">
            <div class="economslider_labels">
                <div class="economslider_label-left"><span>1 год</span></div>
                <div class="economslider_label-center">5 лет</div>
                <div class="economslider_label-right"><span>10 лет</span></div>
            </div>

            <div class="economslider_line">

                <div class="economslider_breaks">
                    @for ($i = 1; $i < 11; $i++)
                        <div class="economslider_breaks-{{$i}}"></div>
                    @endfor
                </div>

                <div class="economslider_line_inner"></div>
            </div>
        </div>

        <div class="economslider_cards">
            <div class="economslider_card">
                <div class="economslider_card_head">
                    <div class="economslider_image economslider_image-left"></div>
                </div>
                <div class="economslider_card_footer">
                    <span class="economslider_value">79900</span>
                </div>
            </div>

            <div class="economslider_card">
                <div class="economslider_card_head">
                    <div class="economslider_image  economslider_image-right"></div>
                </div>
                <div class="economslider_card_footer">
                    <span class="economslider_value">29900</span>
                </div>
            </div>
        </div>

        <div class="economslider_footer">
            <div class="economslider_footer_head">
                <span>экономия</span>
            </div>
            <div class="economslider_footer_btn">
                <span class="economslider_economy">50000</span>
            </div>
        </div>

    </div>
</div>
