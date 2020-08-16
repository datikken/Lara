const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js/admin.js')
    .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

mix
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images', 'public/images')
    .options({
        processCssUrls: false
    });

mix
    .sass('resources/sass/admin.scss', 'public/css/admin.css')
