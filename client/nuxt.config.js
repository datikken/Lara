require('dotenv').config()
const {join} = require('path')
const {copySync, removeSync} = require('fs-extra')

module.exports = {
    ssr: true,
    srcDir: __dirname,
    env: {
        apiUrl: process.env.API_URL,
        appName: 'Recart.me',
        appLocale: process.env.APP_LOCALE
    },

    head: {
        title: process.env.APP_NAME,
        titleTemplate: '%s - ' + process.env.APP_NAME,
        __dangerouslyDisableSanitizers: ['script'],
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'description', name: 'description', content: 'Recart.me'}
        ],
        script: [
            {src: 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'},
            {src: 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'},
            {src: 'https://api-maps.yandex.ru/2.1/?apikey=6a0c633c-193e-4f23-9ff1-01e421de70a5&lang=ru_RU'},
            {src: 'https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js'},
            {src: 'https://widget.unitpay.ru/unitpay.js'},

            {
                hid: 'gtm-script1',
                src: 'https://www.googletagmanager.com/gtag/js?id=UA-177029583-1',
                async: true
            },
            {
                hid: 'gtm-script2',
                innerHTML: `
               window.dataLayer = window.dataLayer || [];
               function gtag(){dataLayer.push(arguments);}
               gtag('js', new Date());
               gtag('config', 'UA-177029583-1');
                       `,
                type: 'text/javascript',
                charset: 'utf-8'
            }
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
        ]
    },

    loading: {color: '#3559fd'},

    router: {
        middleware: []
    },

    css: [
        {src: '~assets/sass/app.scss', lang: 'scss'}
    ],

    plugins: [
        '~plugins/bootstrap'
    ],

    modules: [
        '@nuxtjs/router'
    ],

    build: {
        extractCSS: true
    },

    static: {
        prefix: false
    },

    hooks: {
        generate: {
            done(generator) {
                // Copy dist files to public/_nuxt
                if (generator.nuxt.options.dev === false && generator.nuxt.options.mode === 'spa') {
                    const publicDir = join(generator.nuxt.options.rootDir, 'public', '_nuxt')
                    removeSync(publicDir)
                    copySync(join(generator.nuxt.options.generate.dir, '_nuxt'), publicDir)
                    copySync(join(generator.nuxt.options.generate.dir, '200.html'), join(publicDir, 'index.html'))
                    removeSync(generator.nuxt.options.generate.dir)
                }
            }
        }
    }
}
