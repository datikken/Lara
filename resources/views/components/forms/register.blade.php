<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Регистрация') }}</div>

            <div class="card-greet">
                <p class="card-greet_text">
                    Зарегистрируйте свой аккаунт используя любой способ
                </p>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <span>
                            {{ __('Вы регистрируетесь как') }}
                        </span>

                        <div class="form_type">
                            <div class="form_type-item activeFormItem">
                                <div class="form_type-itemText">
                                    <span>Юр. лицо</span>
                                </div>
                            </div>
                            <div class="form_type-item">
                                <div class="form_type-itemText">
                                    <span class="form_type-itemText_inner">Физ. лицо</span>
                                </div>
                            </div>
                        </div>

                        {{--<input id="type" type="text" class="form-control @error('name') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>--}}

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                     <span>
                         {{ __('Почта') }}
                     </span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <span>
                            {{ __('Пароль') }}
                        </span>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    {{--<div class="form-group row">--}}
                        {{--{{ __('Face') }}--}}

                        {{--<input id="face" type="text" class="form-control @error('password') is-invalid @enderror" name="face" required autocomplete="face">--}}

                        {{--@error('face')--}}
                        {{--<span class="invalid-face" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                        {{--@enderror--}}

                    {{--</div>--}}

                    <div class="form-group row">
                        <span>
                            {{ __('Подтверждение пароля') }}
                        </span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="agreement">

                        <div class="form-check_box">
                            <div class="form-check_box-wrap">
                                <div class="form-check_box-wrap_item">

                                </div>
                            </div>
                        </div>


                        <span>
                            {{ __('Я принимаю условия политики конфиденциальности') }}
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <div>
                            {{ __('Регистрация') }}
                        </div>
                    </button>


                </form>
            </div>
        </div>
    </div>
</div>
</div>