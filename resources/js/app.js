
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/


import Vue from 'vue'; // Importing Vue Library
window.Vue = Vue;
import router from './router';
import app from './app.vue';
import navbar from './components/navbar';
import mainframe from './components/mainframe';

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

Vue.component('app', require('./app.vue'));

const vueapp = new Vue({
  el: '#app',
  router,
  components: { app },
  template: '<app/>'
});

new Vue({
  components: { navbar },
  template: '<navbar/>'
});

new Vue({
  components: { mainframe },
  template: '<mainframe/>'
});
