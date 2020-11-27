const mix = require('laravel-mix');

mix
    .webpackConfig({
        output: {
            filename: 'main/[name].js',
            chunkFilename: 'chunks/[name].js',
        },
    })
    .js('resources/js/main.js', 'js')
    .js('resources/js/main_admin.js', 'js')

mix
    .sass('resources/sass/app.scss', 'css')
    .sass('resources/sass/admin.scss', 'css')
