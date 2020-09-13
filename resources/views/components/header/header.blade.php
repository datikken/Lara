<div class="header">
    <div class="header_wrapper">
        <div class="header_wrapper-item">
            <a href="/">
            <div class="header_wrapper-item_logo">
                <img class="header_wrapper-item_logo-item" src="/images/icons/main_logo.png" alt="Logo"/>
            </div>
            </a>
        </div>
        <div class="header_wrapper-item">
            <ul class="header_wrapper-item_menu">
                <li class="header_wrapper-item_menu-item">
                    <a href="/catalog" class="header_wrapper-item_menu-item_link">Каталог</a>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/information" class="header_wrapper-item_menu-item_link">Информация</a>
                    <ul class="header_wrapper-item_menu-item-secondary">
                        @foreach($information as $inf)
                            <a class="header_wrapper-item_menu-item-secondary_item" href="/information#{{$inf['category']}}">
                                <li>{{ $inf['category'] }}</li>
                            </a>
                        @endforeach
                    </ul>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/hits" class="header_wrapper-item_menu-item_link">Хит - парад принтеров</a>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/sales" class="header_wrapper-item_menu-item_link">Акции</a>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/blog" class="header_wrapper-item_menu-item_link">Блог</a>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/about" class="header_wrapper-item_menu-item_link">О нас</a>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <a href="/contacts" class="header_wrapper-item_menu-item_link">Контакты</a>
                </li>
            </ul>
        </div>
        <div class="header_wrapper-item">
            <div class="header_wrapper-item_contacts">
                <img class="header_wrapper-item_contacts-icon" src='/images/header/header_tel.svg' alt="Logo"/>
                <a href="tel:88005556633" class="header_wrapper-item_contacts-tel">8 800 555 66 33</a>
                {{--<div class="header_wrapper-item_contacts-email">kakayatopochta@gmail.com</div>--}}
            </div>
        </div>
    </div>
</div>
