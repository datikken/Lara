<div id="passReset" class="uk-flex-top" uk-modal>
    <div class="passReset uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="passReset_close uk-modal-close-default" uk-close></div>
        <div class="passReset_inner">

            <div class="passReset_span">
                <span>Для подтверждения вашего аккаунта, введите свою почту</span>
            </div>
            <form method="POST" action="{{ route('sendPasswordResetEmail') }}">
                <div class="form_group">
                    <label for="email" class="form_group_label">{{ __('Введите почту') }}</label>

                    <input class="form_group_input" type="text" name="email">

                    <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
                </div>


                <div class="form_group">
                    @include('components.btn.text_btn', [ 'class' => 'mauto action_btn yellow_btn', 'text' => 'Отправить', 'attr' => 'data-resetPassEmail'])
                </div>

            </form>

        </div>
    </div>
</div>
