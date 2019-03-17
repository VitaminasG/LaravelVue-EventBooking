const mix = require('laravel-mix');

mix.webpackConfig({
    output: {
        chunkFilename: 'chunks/[name].[chunkhash].js',
        publicPath: '/',
    },
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
