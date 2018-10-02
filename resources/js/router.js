import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

/*
Import des composants
*/
import Home from './components/home.vue';
import Login from './components/login.vue';
import Register from './components/register.vue';

// 2. Définition des routes
// Chaque route doit être mappée à un composant
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
]

export default new VueRouter({
  history: true,
  mode: 'history',
  routes
})
