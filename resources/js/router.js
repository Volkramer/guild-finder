import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store/index'

Vue.use(VueRouter);

/*
Components importation
*/
import Home from './components/home.vue';
import Signin from './components/signin.vue';
import Signup from './components/signup.vue';
import Success from './components/success.vue';
import Validate from './components/validate';
import ResetPass from './components/resetPass';
import NewPass from './components/newPass';
import Dashboard from './components/dashboard';

// function to test Auth

/*async function requireAuth (to, from, next) {
    if (!store.getters.isLogged) {
        next('signin');
        return;
    }
    else {
        next();
    }
}*/


// Routes definition
// Each route must be mapped to a component
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
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        // beforeEnter: requireAuth()
    }
];

export default new VueRouter({
    history: true,
    mode: 'history',
    routes
})
