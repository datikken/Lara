<div class="dadresses">
    <div class="dadresses_wrap">
        <div class="dadresses_wrap_head">
            <span>Следующие адреса будут использоваться на странице оформления заказа по умолчанию.</span>
        </div>

        <div class="dadresses_desc">
            <div class="dadresses_desc_top">
                <span>Адрес по умолчанию</span>
            </div>
            <div class="dadresses_desc_bottom">
                <span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span>
            </div>
        </div>

        <div class="dadresses_table">
            <div class="dadresses_table_top">
                <span>Ранее использованые адреса доставки</span>
            </div>

            <div class="dadresses_table_bottom">
                <div class="dadresses_row">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>

                <div class="dadresses_row">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>

                {{--//dadresses_selected--}}
                <div class="dadresses_row ">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>

                <div class="dadresses_row">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>

                <div class="dadresses_row">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>

                <div class="dadresses_row">
                    <div class="dadresses_text"><span>Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787</span></div>
                    <div class="dadresses_select"><span>использовать этот адрес</span></div>
                    <div class="dadresses_close"><span>x</span></div>
                </div>
            </div>

        </div>

        <button type="submit" class="setAddressSubmit" data-url="{{ route('setAddress') }}">
            @include('components.btn.text_btn', [ 'class' => 'form_group-btn action_btn', 'text' => 'Изменить адрес доставки'])
        </button>

    </div>
</div>
