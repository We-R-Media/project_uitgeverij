const mix = require('laravel-mix');
const CopyPlugin = require('copy-webpack-plugin');
const CompressionPlugin = require("compression-webpack-plugin");

// Define the path for Select2 assets in node_modules
const select2Path = 'node_modules/select2/dist';

module.exports = {
    plugins: [
        new CompressionPlugin({
            algorithm: 'gzip',
            test: /\.(js|css|svg)$/,
        }),
        new CopyPlugin({
            patterns: [
                { from: `${select2Path}/css/select2.min.css`, to: 'public/css/select2.css' },
                { from: `${select2Path}/js/select2.min.js`, to: 'public/js/select2.js' },
                { from: `${select2Path}/js/i18n`, to: 'public/js/i18n' },
            ],
        }),
    ]
};

mix.options({
    processCssUrls: false
});

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/maps.js', 'public/js');