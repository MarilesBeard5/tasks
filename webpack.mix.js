const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', []);

mix.options({
    hmrOptions: {
        host: '192.168.56.56',
        port: 8000
    }
})

mix.webpackConfig({
    devServer: {
        static: false,
    },
    watchOptions: {
        aggregateTimeout: 200,
        poll: 5000
    },
})
