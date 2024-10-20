let mix = require('laravel-mix');

require('mix-tailwindcss');


mix.js('src/main.jsx', 'assets/admin/admin-settings.js').react();

mix.sass('src/app.scss', 'assets/admin/admin-settings.css').tailwind('./tailwind.config.js');