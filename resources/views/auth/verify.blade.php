@extends('layouts.index')

@section('center')

    <div class="verify">
        <div class="verify_wrap">
            <div class="verify_wrap_icon"></div>

            <div class="verify_wrap_head">{{ __('Подтверждение почты.') }}</div>

            <div class="verify_wrap_text">{{ __('Для входа в личный кабинет необходимо подтвердить указанную почту') }}</div>

            <a class="verify_wrap_link" href="{{ route('verification.resend') }}">
                @include('components.btn.text_btn', [ 'class' => 'flat_btn action_btn', 'text' => 'Не получили письмо?'])
            </a>

            <a class="verify_wrap_link" href="{{ route('mainPage') }}">
                @include('components.btn.text_btn', [ 'class' => 'flat_btn action_btn animated_btn', 'text' => 'Закрыть'])
            </a>

        </div>
    </div>

@endsection
