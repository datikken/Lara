const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

mix.sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images', 'public/images')
    .options({
        processCssUrls: false
    });