<template>
    <div>
        <mainframe>
            <div>
                <h1>New Password</h1>
                <form autocomplete="off" @submit.prevent="newpass" method="post">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Confirmation</label>
                        <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <div>
                    {{message}}
                </div>
            </div>
        </mainframe>
    </div>
</template>

<script>
    import Mainframe from './mainframe';
    import axios from 'axios';
    export default {
        name: "newPass",
        components: {Mainframe},
    data(){
        return {
            message: '',
            email: '',
            token: '',
            password: '',
            password_confirmation: '',
            isLoading: false,
            hasErrors: false
        }
    },
    computed: {
        isDisabled() {
            return this.password.length === 0 || this.password.length != this.password_confirmation.length
        }
    },
    methods: {
        newpass() {
            this.email = this.$route.params.email;
            this.token = this.$route.params.token;
            if (this.isDisabled) {
                return false
            }

            this.isLoading = true;
            this.hasErrors = false;

            axios.post('/api/password/reset', {
                token: this.token,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(response => {
                this.isLoading = false;
                this.message = "you have successfully changed your password";
            }).catch(error => {
                this.message = error.response.data.message;
            });
        }
    }
    }
</script>

<style scoped>

</style>