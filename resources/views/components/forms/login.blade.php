
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Вход') }}</div>
            <div class="card-greet">
                <p class="card-greet_text" data-auth>
                    С возвращением.
                    Войдите в свой аккаунт
                </p>
            </div>
            <div class="card-body login-form">
                <form method="POST" action="{{ route('login') }}" data-loginForm="true">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="row_label">{{ __('Почта') }}</label>
                        <input type="email" placeholder="Введите вашу почту" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    </div>
                    <div class="form-group row password_field mb20">
                        <span class="password_field-label"></span>

                        <label for="email" class="row_label password_hide">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input type="password" placeholder="Введите ваш пароль"  class="form-control password_input @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        </div>
                    </div>


                    <div class="form-group row mb20">
                        <div class="agreement_check">
                            <div class="form-check">

                                @include('components.checkbox.simple_check', ['name' => 'remember'])

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                            <a class="btn-link" href="{{ route('password.request') }}" data-forgotPassword uk-toggle="target: #passReset">
                                {{ __('Забыли пароль?') }}
                            </a>
                        </div>
                    </div>

                    <div class="form-group row mb-0 yellow_btn animated_btn">
                        <button type="submit" class="yellow_btn animated_btn" data-loginForm="true">
                            {{ __('Войти') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('components.modals.resetPassword')
@include('components.modals.passResetForm')
@include('components.modals.emailHasBeenSent')
@include('components.modals.emailIsNotVerified')
