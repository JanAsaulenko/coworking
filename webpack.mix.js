let mix = require('laravel-mix');
const path = require('path');

mix.webpackConfig({
    devtool: 'inline-source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules\/(?!(dom7|ssr-window|swiper)\/).*/,
                use: {
                    loader: 'babel-loader'
                }
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "sass-loader"
                    },

                ]
            },
            {
                test: /\.(png|jpg|jpeg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {}
                    }
                ]
            }
        ]
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    })
    .sourceMaps()
    .browserSync({
        proxy:{
              target:  "http://coorking"
            },
        files: [
            'public/css/*.scss',
            'public/js/*.js'
        ]
    });

mix.disableNotifications();