const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js/admin.js')

mix
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css/admin.css')
    .options({
        processCssUrls: false,
        autoprefixer: {
            options: {
                browsers: [
                    'last 6 versions',
                ]
            }
        }
    })
    .copyDirectory('resources/assets/images', 'public/images')
