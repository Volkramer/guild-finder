import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

/*
Import des composants
*/
import Home from './components/home.vue';
import Signin from './components/signin.vue';
import Signup from './components/signup.vue';
import Success from './components/success.vue';
import Validate from './components/validate';

// 2. Définition des routes
// Chaque route doit être mappée à un composant
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/signin',
        name: 'signin',
        component: Signin
    },
    {
        path: '/signup',
        name: 'signup',
        component: Signup
    },
    {
        path: '/success',
        name: 'success',
        component: Success
    },
    {
        path: '/validate',
        name: 'validate',
        component: Validate
    }
]

export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})
