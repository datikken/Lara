<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-greet register_greet">
                    <p class="card-greet_text">
                        Зарегистрируйте свой аккаунт используя любой способ
                    </p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row" style="display: none;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="registration" required autocomplete="name" autofocus>

                            </div>
                        </div>


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

                            @error('type')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="type" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="type"
                                   style="display: none;"
                                   value="fizik"
                                   required autocomplete="type" autofocus>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Почта') }}</label>

                            <div class="col-md-6">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="email" type="email" placeholder="Введите вашу почту" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row password_field">
                            <span class="password_field-label"></span>
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>


                            <div class="col-md-6">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password" placeholder="Введите пароль" type="password" class="form-control password_hide @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label for="face" class="col-md-4 col-form-label text-md-right">{{ __('Face') }}</label>

                            <div class="col-md-6">
                                <input id="face" type="text" class="form-control @error('password') is-invalid @enderror" name="face" value="face" required autocomplete="face">

                                @error('face')
                                <span class="invalid-face" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row password_field">
                            <span class="password_field-label"></span>
                            <label for="password-confirm" class="col-md-4 col-form-label password_hide text-md-right">{{ __('Подтверждение пароля') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Подтвердите пароль" type="password" class="form-control password_hide" name="password_confirmation" required autocomplete="new-password">
                            </div>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>