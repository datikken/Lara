<div id="emailHasBeenSent" class="uk-flex-top" uk-modal>
    <div class="emailHasBeenSent uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="emailHasBeenSent_close uk-modal-close-default" uk-close></div>
        <div class="emailHasBeenSent_inner">

            <div class="emailHasBeenSent_img">
                <img src="/images/icons/emailHasBeenSent.svg" alt="Sent" class="emailHasBeenSent_icon">
            </div>

            <div class="emailHasBeenSent_head">
                <span class="emailHasBeenSent_head_txt">Письмо с инструкцией отправлено на почту</span>
            </div>

            @include('components.btn.text_btn', [ 'class' => 'flat_btn', 'text' => 'Закрыть'])

        </div>
    </div>
</div>
