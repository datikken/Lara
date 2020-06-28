@extends('layouts.index')

@section('center')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтверждение почты.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Подтверждение почты.') }}
                        </div>
                    @endif

                    {{ __('Перед тем как войти, вам необходимо подтвердить почтовый ящик.') }}
                    <a href="{{ route('verification.resend') }}">{{ __('Не получили письмо?') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
