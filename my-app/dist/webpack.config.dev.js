"use strict";

// Generated using webpack-cli https://github.com/webpack/webpack-cli
var path = require('path');

var HtmlWebpackPlugin = require('html-webpack-plugin');

var WorkboxWebpackPlugin = require('workbox-webpack-plugin');

var isProduction = process.env.NODE_ENV == 'production';
var config = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist')
  },
  devServer: {
    open: true,
    host: 'localhost'
  },
  plugins: [new HtmlWebpackPlugin({
    template: 'index.html'
  }) // Add your plugins here
  // Learn more about plugins from https://webpack.js.org/configuration/plugins/
  ],
  module: {
    rules: [{
      test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
      type: 'asset'
    } // {
    //     dev: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
    //     type: 'asset',
    // },
    // Add your rules for custom modules here
    // Learn more about loaders from https://webpack.js.org/loaders/
    ]
  }
};

module.exports = function () {
  if (isProduction) {
    config.mode = 'production';
    config.plugins.push(new WorkboxWebpackPlugin.GenerateSW());
  } else {
    config.mode = 'development';
  }

  return config;
};