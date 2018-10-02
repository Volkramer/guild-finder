<template>
    <div>
        <mainframe>
            <div>
                <form autocomplete="off" @submit.prevent="signup" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" v-model="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Confirmation</label>
                        <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </mainframe>
    </div>
</template>

<script>
    import axios from 'axios'
    import mainframe from '../mainframe'
    export default {
        components: {
            mainframe
        },
        data() {
            return {
                username: '',
                email: '',
                password: '',
                password_confirmation: '',
                isLoading: false,
                hasErrors: false
            }
        },
        computed: {
            isDisabled() {
                return this.username.length === 0 || this.email.length === 0 || this.password.length === 0 || this.password.length != this.password_confirmation.length
            }
        },
        methods: {
            signup() {
                if (this.isDisabled) {
                    return false
                }

                this.isLoading = true;
                this.hasErrors = false;

                axios
                    .post('/api/auth/signup', {
                        username: this.username,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    })
                    .then(response => {
                        this.isLoading = false;
                        if(response.status === 201){
                            router.push({ name: 'success', params: { message: response.data.message }});
                        }
                    })
            }
        }
    }
</script>

<style>

</style>
