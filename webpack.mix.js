const mix = require('laravel-mix');
const webpack = require('webpack');

const CompressionPlugin = require('compression-webpack-plugin');

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

mix.sass('./sass/main.scss', '/css/main.css');

mix.js('./javascript/main.js', './dist/js/bundle.js');
mix.js('./javascript/maps.js', './dist/js/maps.js');