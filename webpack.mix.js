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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// mix.combine([
//     'node_modules/moment/min/moment.min.js',
//     'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js',
//     'node_modules/select2/dist/js/select2.min.js',
//     'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
//     'node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js',
//     'node_modules/@coreui/coreui/dist/js/coreui.min.js'
// ], 'public/js/vendor.js');

// mix.sass([
//     'node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css'
// ], 'public/css/vendor.css' )

    // mix.scripts([
    //     'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    //     'resources/js/app.js'
    //  ])
    //mix.js('resources/js/app.js', 'public/js')
//mix.sass('resources/sass/app.scss', 'public/css');


// mix.copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/js');
// mix.copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/js');
// mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/css');
