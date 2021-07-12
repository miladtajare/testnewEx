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
//    .sass('resources/sass/app.scss', 'public/css');

   
// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


//blade Auth

    mix.scripts([
        'resources/js/Auth/sweetalert.min',
        'resources/js/Auth/bootstrap.bundle.min',
        
    ], 'public/js/Auth/app.js');

    mix.styles([
        'resources/css/Auth/bootstrap.min.css',

    ], 'public/css/Auth/app.css');
    
    
    
//blade panel
    
    mix.scripts([
        'resources/js/Panel/jquery.min.js',
        'resources/js/Panel/bootstrap.bundle.min.js',
        'resources/js/Panel/jquery.slimscroll.min.js',
        'resources/js/Panel/fastclick.js',
        'resources/js/Panel/adminlte.min.js',
        'resources/js/Panel/sweetalert.min.js',

    ], 'public/js/Panel/app.js');
    
    mix.styles([
        'resources/css/Panel/adminlte.min.css',
        'resources/css/Panel/bootstrap-rtl.min.css',
        'resources/css/Panel/custom-style.css',
        'resources/css/Panel/ionicons.min.css',
        'resources/css/Panel/font-awesome.min.css',

    ], 'public/css/Panel/app.css');

    
    
    
    
    
   

    