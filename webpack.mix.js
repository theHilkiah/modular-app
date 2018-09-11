const mix = require('laravel-mix');
let fs = require('fs');
let resolve = require('path').resolve;
let join = require('path').join;
// import {resolve, join} from require('path');
// let cp = require('child_process')
// let os = require('os')
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public')
    .js('resources/js/app.js', 'js')
    .sass('resources/sass/app.scss', 'css')
    .js('resources/js/admin.js', 'js')
    .sass('resources/sass/admin.scss', 'css');


/**
 * -----------------------------------------------
 * Bring and mix in all 'module' assets
 * -----------------------------------------------
 */

let lib = resolve(__dirname, './admin/')

fs.readdirSync(lib).forEach(function(mod) {
    var modPath = join(lib, mod)

    var appJs = join(modPath, '/Resources/assets/js/app.js')
    var mixJs = join(__dirname, 'js', mod.toLowerCase() + '.js')

    if (fs.existsSync(appJs)) mix.js(appJs, mixJs)

    var appScss = join(modPath, '/Resources/assets/sass/app.scss')
    var mixScss = join(__dirname, 'css', mod.toLowerCase() + '.css')

    if (fs.existsSync(appScss)) mix.sass(appScss, mixScss)
});



if (mix.inProduction()) {
    mix.version();
}