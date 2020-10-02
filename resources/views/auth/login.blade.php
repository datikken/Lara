@extends('layouts.index')

@section('center')

    <div class="main" <? if(isset($reset)) { echo 'data-resetPass'; }?>>
        @include('components.forms.login')

        <div class="auth-decor"></div>
        <div class="auth-pick">
            <span class="auth-pick_item">или</span>
        </div>

        @include('components.forms.register')

    </div>

@endsection
