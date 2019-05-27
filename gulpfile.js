var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});


style([
    'libs/blog-post.css',
    'libs/bootstrap.css',
    'libs/font-awesome.css',
    'libs/metisMenu.css',
    'libs/sb-admin-2.css'

],'./public/css/libs.css')

.script([
    'libs/bootstrap.js',
    'libs/metisMenu.js',
    'libs/sb-admin-2.js',
    'libs/jquery.js',
    'libs/scripts.js'
    ],'./public/js/libs.js')
