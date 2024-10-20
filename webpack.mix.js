let mix = require('laravel-mix');
const path = require("path");
require('mix-tailwindcss');

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'src'),
        },
        extensions: ['.js', '.jsx', '.tsx', '.json']
    }
});


mix.js('src/index.jsx', 'assets/admin/admin-settings.js').react();

mix.sass('src/app.scss', 'assets/admin/admin-settings.css').tailwind('./tailwind.config.js');