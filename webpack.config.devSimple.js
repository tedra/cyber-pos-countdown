const path = require('path');
const merge = require('webpack-merge');
const webpackConfig = require('./webpack.config');

const IS_DEV = (process.env.NODE_ENV === 'dev');
const dirAssets = path.join(__dirname, '_web/css');

module.exports = merge(webpackConfig, {

  devtool: 'eval',

  output: {
    path: path.resolve(__dirname, './_web'),
    filename: '[name].js'
  },

  devServer: {
    contentBase: path.resolve(__dirname, './_web'),
    port: 8080,
    watchOptions: {
      poll: 1000
    },
    stats: {
      children: false
    }
  },

  module: {
    rules: [
      // CSS / SASS
      {
        test: /\.(css|scss)/,
        use: [
          'style-loader',
          {
            loader: 'css-loader',
            options: {
              sourceMap: IS_DEV
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: IS_DEV,
              includePaths: [dirAssets]
            }
          }
        ]
      }
    ]
  }

});
