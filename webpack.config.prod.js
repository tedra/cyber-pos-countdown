const path = require('path');
const merge = require('webpack-merge');
const webpackConfig = require('./webpack.config');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');


const IS_DEV = (process.env.NODE_ENV === 'dev');
const dirAssets = path.join(__dirname, '_web/css');

module.exports = merge(webpackConfig, {

    // devtool: 'source-map', // uncomment if you want to generate source maps to compiled js and css files

    output: {
        path: path.join(__dirname, '_web'),
        filename: 'js/[name].js'
    },

    plugins: [
        //  new CleanWebpackPlugin(['_web', '!**/*.php']),

        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
            chunkFilename: 'css/[id].css'
        }),

        // this gets rid of any css that we are not using as
        //
    ],

    module: {
        rules: [{
            // Apply rule for .css files
            // CSS / SASS
            test: /\.(css|scss)/,
            use: [{
                    loader: MiniCssExtractPlugin.loader
                },
                {
                    loader: "css-loader",
                },
                {
                    loader: 'postcss-loader',
                    options: {
                        ident: 'postcss',
                        plugins: [
                            require('tailwindcss'),
                            require('postcss-nested'), //plugin to unwrap nested rules like how Sass does it
                            require('autoprefixer')
                        ],
                    },
                },
                {
                    loader: 'sass-loader',
                    options: {
                        sourceMap: IS_DEV,
                        includePaths: [dirAssets]
                    }
                }
            ]
        }, ]
    }

});