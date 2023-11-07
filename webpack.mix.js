const mix = require('laravel-mix')
const webpack = require('webpack');
const CompressionPlugin = require("compression-webpack-plugin");

module.exports = {
    plugins: [
        new CompressionPlugin({
            algorithm: 'gzip',
            test: /\.(.js|css|svg)$/,
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        })
    ]
};

mix.options({
    processCssUrls: false
});

mix.sass('resources/sass/styles.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/maps.js', 'public/js');