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
    mix.sass('app.scss')
    	.scripts([
    			'libs/sweetalert.min.js',
    			'libs/lity.js'
    		])
    	.styles([
    			'libs/bootstrap.css',
    			'libs/bootstrap-theme.css',
    			'libs/sweetalert.css',
    			'libs/lity.css',
    			'libs/1-col-portfolio.css'
    		]);
});