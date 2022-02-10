const mix = require('laravel-mix')

mix.webpackConfig({
  module: {
    rules: [
      {
        test: /\.mjs$/i,
        resolve: { byDependency: { esm: { fullySpecified: false } } },
      },
    ],
  },
})

mix.js('resources/js/app.js', 'public/js').
  vue().
  sass('resources/scss/app.scss', 'public/css').
  disableNotifications()
