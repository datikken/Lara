<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="{!! mix('js/app.js') !!}"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    @extends('layouts.index')

    @section('center')
        <div class="error">
            <div class="error404">
                <img src='/images/404/404.svg' alt="Error" />
            </div>
        </div>
    @endsection
</body>
</html>


