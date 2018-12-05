/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// VueJs
window.Vue = require('vue');
window.Clipboard = require('vue-clipboard2');
window.Vue.use(window.Clipboard);

// Components
Vue.component('Accounts', require('./components/Accounts.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * Fade out flash messages
 */
setTimeout(function () {
    $('#flash-message').fadeOut('slow');
}, 2000); // <-- time in milliseconds

/**
 * Autofocus on modal open
 */
$('.modal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
});

