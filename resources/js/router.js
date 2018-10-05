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
import ResetPass from './components/resetPass';
import NewPass from './components/newPass';
import Profil from './components/profil';

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
    },
    {
        path: '/resetpassword',
        name: 'resetPass',
        component: ResetPass
    },
    {
        path: '/newpass/:email/:token',
        name: 'newPass',
        component: NewPass
    },
    {
        path: '/profils',
        name: 'profil',
        component: Profil
    }
];

export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})
