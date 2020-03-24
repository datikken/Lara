<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printers</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    @extends('layouts.index')
    @section('center')
        @include('components.landing.lenta')
        @include('components.landing.video')
        @include('components.landing.heading')

        @include('components.landing.block',
            ['image' => '/images/landing/printerIcon.svg',
             'lie' => 'Портят',
             'truth' => 'Не портят принтеры',
             'desc' => 'В России много дешёвых картриджей сомнительного качества. Мы бы и сами не рискнули поставить их в свои принтеры. А по данным многочисленных исследований, до 30% «оригинальных» картриджей на самом деле подделка.',
             'footer'=> 'Мы создаём картриджи из дорогих японских, американских и южно-корейских комплектующих. Наши сотрудники принимают и тестируют каждую партию прямо на заводе. Мы уверены в своих картриджах и гарантируем, что они не сломают принтер.',
             'cartoon' => '/images/landing/printer.svg'])

        @include('components.landing.feedback')

        @include('components.landing.block',
            ['image' => '/images/landing/printerIcon2.svg',
             'lie' => 'Плохо',
             'truth' => 'Хорошо печатают',
             'desc' => 'Ещё есть мнение, будто совместимые картриджи обязательно плохо печатают. Это тоже неправда. Для каждой модели картриджа мы подбираем лучшую пару тонер-фотовал. Учитываем совместимость с компонентами и результаты предыдущих тестов. Поставщики тонера Mitsubishi, Tomoegawa, Static Control, LG Chem.',
             'footer'=> 'Новые модели картриджей проходят тесты на вертикальный и горизонтальный градиент, отсутствие фантомных изображений, равномерность заливки и общее качество печати.',
             'cartoon' => '/images/landing/pallete.svg'])

    @endsection
</body>
</html>
