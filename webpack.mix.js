const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.js([
    'resources/js/app.js',
    'resources/js/assets/input_file.js',
    'resources/js/assets/request_form.js',
    'resources/js/assets/tags-color.js',
    'resources/js/assets/flash_message.js',
    ], 'public/js/app.js')
   .sass('resources/sass/app.scss', 'public/css');
