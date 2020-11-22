const path = require('path');
const mix = require('laravel-mix');

mix.setPublicPath('public/build/'); // @note Корневой путь к билдам
mix.setResourceRoot('build/');      // @note Задаем путь к шрифтам

mix
    .js('resources/js/main.js', 'app.build.js')
    .js('resources/js/main_admin.js', 'app.admin.js')
    .sass('resources/sass/app.scss', 'app.build.css')
    .sass('resources/sass/admin.scss', 'app.admin.css')
    .sourceMaps()
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import'],
    })
    .webpackConfig({
        output: {
            path: path.resolve('public/build/'), // @note Задаем каталог для chunk'ов
            publicPath: '/build/',
            //filename: 'build.[name].js',
            chunkFilename: '[name].chunk.js'     // @note Плейсхолдеры: [id], [name], [chunkhash]
        }
    })
    .options({
        processCssUrls: false,
        autoprefixer: {
            options: {
                browsers: [
                    'last 6 versions'
                ]
            }
        }
    })
