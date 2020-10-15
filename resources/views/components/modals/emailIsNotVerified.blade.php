<div id="emailIsNotVerified" class="uk-flex-top" uk-modal>
    <div class="emailIsNotVerified uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="emailIsNotVerified_close uk-modal-close-default" uk-close></div>
        <div class="emailIsNotVerified_inner">

            <div class="emailIsNotVerified_icon">
                <img src="/images/icons/emailVerify.svg" class="emailIsNotVerified_img" alt="Email" />
            </div>
            <div class="emailIsNotVerified_head">
                <span class="emailIsNotVerified_head_txt">Подтверждение почты!</span>
            </div>

            <div class="emailIsNotVerified_span">
                <span>Для входа в личный кабинет необходимо подтвердить указанную почту</span>
            </div>


            @include('components.btn.text_btn', [ 'class' => 'flat_btn', 'text' => 'Не получили письмо?'])
            @include('components.btn.text_btn', [ 'class' => 'action_btn animated_btn', 'text' => 'закрыть'])


        </div>
    </div>
</div>
