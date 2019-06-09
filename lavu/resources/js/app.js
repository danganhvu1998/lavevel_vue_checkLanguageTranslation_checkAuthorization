/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('user-register', require('./components/auth/Register').default);
Vue.component('user-login', require('./components/auth/Login').default);

//#######################################################################\\

Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('new-article', require('./components/NewArticle.vue').default);
Vue.component('load-article', require('./components/LoadArticle.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            user: {
                name: '',
                email: '',
                remember_token: '',
            },
        };
    },
    methods: {
        saveUser(userInfo){
            console.log("App Level", userInfo);
            this.user = userInfo;    
        },
    },
});
