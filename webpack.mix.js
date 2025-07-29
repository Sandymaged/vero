const mix = require('laravel-mix');
require('laravel-mix-compress');

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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.combine([
    'portal/assets/css/font-icons.css',
    'portal/assets/css/plugins.css',
    'portal/assets/css/style.css',
    'portal/assets/css/responsive.css',
    'portal/assets/css/rs6.css',
    'portal/assets/css/custom.css',
    'portal/assets/css/ionicons.min.css',
    'portal/assets/css/select2.min.css',
], 'portal/assets/css/app.css')
    .combine([
            'portal/assets/js/plugins.js',
            'portal/assets/js/main.js',
            'portal/assets/js/rbtools.min.js',
            'portal/assets/js/rs6.min.js',
            'portal/assets/js/script.js',
            'portal/assets/js/select2.min.js',
        ],
        'portal/assets/js/app.js')
    .minify('portal/assets/css/app.css')
    .minify('portal/assets/js/app.js');

mix.compress();
