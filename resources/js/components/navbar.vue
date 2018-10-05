<template>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <router-link :to="{ name: 'home' }" class="navbar-item"><h1>GUILD FINDER</h1></router-link>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-start">
            <div class="control is-small is-loading">
                <input class="input is-small" type="text" placeholder="Rechercher">
            </div>
        </div>
        <div class="navbar-end">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><router-link :to="{ name: 'signin' }" v-if="!isLogged">Login</router-link></li>
                    <li><router-link :to="{ name: 'signup' }" v-if="!isLogged">Register</router-link></li>
                    <span v-if="isLogged">
                    <li><router-link :to="{ name: 'profil' }"> Hi, {{username}}</router-link></li>
                    </span>
                    <li class="nav-link" v-if="isLogged" @click="logout">Logout</li>
                </ul>
            </nav>
        </div>
    </nav>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: 'navbar',
        data() {
            return {
                token: localStorage.token,
                username: ''
            }
        },

        computed:
            mapGetters([
                'isLogged',
            ]),

        methods: {
            logout() {
                this.$store.dispatch('logout');
            },
        },

        created(){
            console.log(isLogged);
            if(this.store.getters.isLogged){
                axios.get('api/user', {
                    token: this.token
                }).then(response => {
                    console.log(response);
                    response.data.username
                }).catch(error =>{
                    console.log(error);
                    this.hasErrors = true;
                });
            }
        }
    }

</script>

<style>
    h1 {
        font-family: LifeCraft;
    }
</style>
