@extends('layouts.index')

@section('center')

    <div class="verify">
        <div class="verify_wrap">
            <div class="verify_wrap_head">{{ __('Подтверждение почты.') }}</div>

            <div class="verify_wrap_text">{{ __('Перед тем как войти, вам необходимо подтвердить почтовый ящик.') }}</div>

            <a class="verify_wrap_link" href="{{ route('verification.resend') }}">
                @include('components.btn.text_btn', [ 'class' => 'flat_btn', 'text' => 'Не получили письмо?'])
            </a>
        </div>
    </div>

@endsection
