const mix = require('laravel-mix');

mix
    .js('resources/js/main.js', 'js/app.js')
    .js('resources/js/main_admin.js', 'js/admin.js')
    .sass('resources/sass/app.scss', 'css/app.css')
    .sass('resources/sass/admin.scss', 'css/admin.css')
