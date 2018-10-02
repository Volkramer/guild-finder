import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

/*
Import des composants
*/
import Home from './components/home.vue';
import Signin from './components/Auth/signin.vue';
import Signup from './components/Auth/signup.vue';
import Success from './components/Auth/accountSuccess.vue';

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
    }
]

export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})
