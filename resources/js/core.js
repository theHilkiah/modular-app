
/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *          CSRF TOKEN
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *          BASIC
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js').default;
    require('bootstrap');
} catch (e) {}

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *          AXIOS
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *          VUE.JS
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

window.Vue = require('vue');

Vue.config.devtools = true; //window.location.hostname == 'localhost';

// const App = new Vue({
//     el: "#main"
// });

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *          ECHO
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
