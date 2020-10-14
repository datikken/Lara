<div id="passResetForm" class="uk-flex-top" uk-modal>
    <div class="passResetForm uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="passResetForm_close uk-modal-close-default" uk-close></div>
        <div class="passResetForm_inner">

            <div class="passResetForm_img">
                <img src="/images/icons/passResetIcon.svg" alt="Reset" class="passResetForm_icon">
            </div>

            <div class="passResetForm_head">
                <span class="passResetForm_head_txt">Смена пароля</span>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form_group">
                    <label for="email" class="form_group_label">{{ __('Введите новый пароль') }}</label>

                    <input class="form_group_input" type="password" name="new_password" placeholder="Новый пароль">

                    <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
                </div>


                <div class="form_group">
                    <label for="email" class="form_group_label">{{ __('Повторите новый пароль') }}</label>

                    <input class="form_group_input" type="password" name="new_password_confirm" placeholder="Повторить пароль">

                    <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
                </div>

                <div class="form_group">
                    @include('components.btn.text_btn', ['attr' => 'data-passResetBtn', 'class' => 'action_btn animated_btn', 'text' => 'Отправить'])
                </div>

            </form>

        </div>
    </div>
</div>
