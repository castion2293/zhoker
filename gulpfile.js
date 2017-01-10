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
                'main.css'])
           .scripts(['0609.js',
                    'JQ.js',
                    'parsley.min.js',
                    'bootstrap-datetimepicker.min.js']);
           //.webpack('app.js');
    
});
