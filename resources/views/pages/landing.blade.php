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

    @include('components.landing.landswipe')

@endsection