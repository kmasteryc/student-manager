var elixir = require('laravel-elixir');
var bootstrapJs = "./node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js";
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
    mix.scripts(['*.js'],'./public/js/app.js');
});
