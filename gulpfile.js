const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
        mix.styles(['w3.css',
                'component.css',
                'bootstrap-datetimepicker.min.css',
                'star-rating.css',
                'main.css',
                'styles.css',
                'jQueryPagination.min.css',
                'loadme.css'])
           .scripts(['0609.js',
                    'JQ.js',
                    'parsley.min.js',
                    'star-rating.js',
                    'bootstrap-datetimepicker.min.js',
                    'jquery.tabslet.min.js',
                    'initializers.js',
                    'jQueryPagination.min.js']);
           //.webpack('app.js');
    
});
