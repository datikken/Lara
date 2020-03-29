
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Вход') }}</div>

            <div class="card-greet">
                <p class="card-greet_text">
                    С возвращением.
                    Войдите в свой аккаунт
                </p>
            </div>




            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="row_label">{{ __('Почта') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="email" class="row_label">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="agreement_check">
                            <div class="form-check">
                                <div class="form-check_box">
                                    <div class="form-check_box-wrap">
                                        <div class="form-check_box-wrap_item">

                                        </div>
                                    </div>
                                </div>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Войти') }}
                        </button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>