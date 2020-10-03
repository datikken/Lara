<div id="passReset" class="uk-flex-top" uk-modal>
    <div class="passReset uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="passReset_close uk-modal-close-default" uk-close></div>
        <div class="passReset_inner">

            <div class="passReset_img">
                <img src="/images/icons/passResetIcon.svg" alt="Reset" class="passReset_icon">
            </div>

            <div class="passReset_head">
                <span class="passReset_head_txt">Смена пароля</span>
            </div>

            <form method="POST" action="{{ route('sendPasswordResetEmail') }}">
                <div class="form_group">
                    <label for="email" class="form_group_label">{{ __('Введите почтовый адрес') }}</label>

                    <input class="form_group_input" type="text" name="email" placeholder="Почтовый адрес">

                    <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
                </div>


                <div class="form_group">
                    @include('components.btn.text_btn', [ 'class' => 'action_btn animated_btn', 'text' => 'Отправить'])
                </div>

            </form>

        </div>
    </div>
</div>
