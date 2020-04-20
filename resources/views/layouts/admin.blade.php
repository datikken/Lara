<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <meta name="theme-color" content="#563d7c">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">

    <title>Админка</title>

    @include('components.styles.style')
    @include('components.scripts.scripts')
    @include('components.bootstrap.bootstrap')

</head>
<body>

<nav class="uk-navbar-container" uk-navbar>

    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active">
                <a href="/admin/products">
                    {{$userData['name']}}
                </a>
            </li>
        </ul>
    </div>
    <div class="uk-navbar-right uk-margin-right">
        <form class="uk-search uk-search-default">
            <input class="uk-search-input" type="search" placeholder="Search...">
        </form>
    </div>

</nav>


<div class="admin_pannel">
    <div class="uk-sidebar">

        <ul uk-accordion="multiple: true" class="uk-margin-left">
            <li class="uk-closed">
                <a class="uk-accordion-title" href="#">База данных</a>
                <div class="uk-accordion-content">
                    <div class="uk-flex-between uk-flex uk-margin-bottom">
                        <a href="/admin/products">Продукты</a>
                        <a href="/admin/createProductForm" uk-icon="plus" class="uk-margin-small-right uk-icon"></a>
                    </div>
                    <div class="uk-flex-between uk-flex uk-margin-bottom">
                        <a href="/admin/banners">Баннеры</a>
                        <a href="/admin/createProductForm" uk-icon="plus" class="uk-margin-small-right uk-icon"></a>
                    </div>
                    <div class="uk-flex-between uk-flex uk-margin-bottom">
                        <a href="/admin/information">Информация</a>
                        <a href="/admin/createInformation" uk-icon="plus" class="uk-margin-small-right uk-icon"></a>
                    </div>
                </div>
            </li>
            <li class="uk-closed">
                <a class="uk-accordion-title" href="#">Письма</a>
                <div class="uk-accordion-content">
                    <div class="uk-flex-between uk-flex uk-margin-bottom">
                        <a href="/admin/sendemail">Свободное письмо</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="uk-container">
        @yield('center')
    </div>


</div>


@include('components.scripts.scripts')

</body>
</html>
