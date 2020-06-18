<div class="subscription">
    <div class="subscription_wrapper">
        <div class="subscription_wrapper-item">
            <span class="subscription_wrapper-item_heading">Хотите быть в курсе новостей из мира картриджей?</span>
        </div>
        <form class="subscription_wrapper-item" method="POST" action="{{ route('subscribe') }}">
            @csrf
            <input type="text" name="email" placeholder="Введите свою почту">

            <button type="submit" class="subscription_wrapper-item_button">
                <span>{{ __('Отправить') }}</span>
            </button>
        </form>
    </div>
</div>