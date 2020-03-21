<div class="header">
    <div class="header_wrapper">
        <div class="header_wrapper-item">
            <Link to="/">
            <div class="header_wrapper-item_logo">
                <img class="header_wrapper-item_logo-item" src={'/header/LOGO.png'} alt="Logo"/>
            </div>
            </Link>
        </div>
        <div class="header_wrapper-item">
            <ul class="header_wrapper-item_menu">
                <li class="header_wrapper-item_menu-item"><Link to="/catalog">Каталог</Link></li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/information">Информация</Link>
                    <ul class="header_wrapper-item_menu-item-secondary">
                        <Link class="header_wrapper-item_menu-item-secondary_item" to="/information#payments">
                        <li>Оплата</li>
                        </Link>
                        <Link class="header_wrapper-item_menu-item-secondary_item" to="/information#delivery">
                        <li>Доставка</li>
                        </Link>
                        <Link class="header_wrapper-item_menu-item-secondary_item" to="/information#guaranty">
                        <li>Гарантия</li>
                        </Link>
                    </ul>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/hits">Хит-парад принтеров</Link>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/sales">Акции</Link>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/blog">Блог</Link>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/about">О нас</Link>
                </li>
                <li class="header_wrapper-item_menu-item">
                    <Link to="/contacts">Контакты</Link>
                </li>
            </ul>
        </div>
        <div class="header_wrapper-item">
            <div class="header_wrapper-item_contacts">
                <div class="header_wrapper-item_contacts-icon">
                    <img class="header_wrapper-item_contacts-icon-item" src={'/header/contact.svg'} alt="Logo"/>
                </div>
                <span class="header_wrapper-item_contacts-tel">8 800 555 66 33</span>
                <div class="header_wrapper-item_contacts-email">kakayatopochta@gmail.com</div>
            </div>
        </div>
    </div>
</div>
