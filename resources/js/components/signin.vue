<template>
    <div>
        <mainframe>
            <div>
                <form autocomplete="off" @submit.prevent="signin" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <div class="form-group">
                        <label>Remember me</label>
                        <input type="checkbox" id="remember-me" class="form-control" v-model="remember">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Sign in</button>
                        <router-link :to="{ name: 'resetPass' }">Forgot your password?</router-link>
                    </div>
                </form>
            </div>
        </mainframe>
    </div>
</template>

<script>
    import mainframe from './mainframe'
    import axios from 'axios'
    export default {
        components: {
            mainframe
        },
        data() {
            return {
                email: '',
                password: '',
                remember: '',
                isLoading: false,
                hasErrors: false
            }
        },
        computed: {
            isDisabled() {
                return this.email.length === 0 || this.password.length === 0
            }
        },
        methods: {
            signin() {
                if (this.isDisabled) {
                    return false
                }

                this.isLoading = true;
                this.hasErrors = false;

                axios.post('api/auth/login', {
                    email: this.email,
                    password: this.password,
                    remember: this.remember
                }).then(response => {
                    this.isLoading = false;
                    this.$store.dispatch('login', response.data.access_token);
                }).catch(error =>{
                    console.log(error);
                    this.isLoading = false;
                    this.hasErrors = true;
                    this.password = ''
                });
            }
        }
    }
</script>

<style>

</style>
