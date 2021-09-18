const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    output: {
        chunkFilename: (mix.inProduction()) ? 'js/chunks/[name].js' : 'js/chunks/[name].[hash].js',
    }
});
