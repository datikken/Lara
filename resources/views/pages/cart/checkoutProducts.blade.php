@extends('layouts.cartProducts')
@section('center')

    <div class="cart_check-wrapper">
<? if(\App\Includes\HelperString::userType() === 'fizik') { ?>
        @include('components.cart.cart_auth_fizik')

<?   } else { ?>
        @include('components.cart.cart_auth_urik')

<?  } ?>
    </div>

@endsection
