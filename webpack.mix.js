const mix = require('laravel-mix');

mix.setPublicPath('./');

mix.postCss('./source/css/style.css', 'css', [
    require('tailwindcss'),
		require('autoprefixer'),
]);

// mix.js('./source/js/app.js', 'js');

if (mix.inProduction()) {
    mix.version();
}
