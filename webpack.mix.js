let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.setResourceRoot('../');

mix.js('src/js/wp_pricing_admin_app.js', 'public/js/wp_pricing_admin_app.js')
    .sass('src/scss/wp_pricing_admin.scss', 'public/css/wp_pricing_admin.css')
    .sass('src/scss/wp_pricing_public.scss', 'public/css/wp_pricing_public.css')
    .copy('src/img', 'public/img');