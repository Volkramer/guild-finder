<template>
    <div>
        <mainframe>
            <form autocomplete="off" @submit.prevent="resetPassword" method="post">
                <div class="formgroup">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-default">Reset your password</button>
                </div>
                <div>
                    {{ message }}
                </div>
            </form>
        </mainframe>
    </div>
</template>

<script>
    import Mainframe from './mainframe';
    import axios from 'axios';
    export default {
        name: "resetPass",
        components: {Mainframe},

        data() {
            return {
                message: '',
                email: '',
                isLoading: false,
                hasErrors: false
            }
        },
        computed: {
            isDisabled() {
                this.email.length === 0;
            }
        },
        methods: {
            resetPassword() {
                if (this.isDisabled) {
                    return false
                }
                this.isLoading = true;
                this.hasErrors = false;

                axios.post('/api/password/create', {
                    email: this.email,
                }).then(response => {
                    this.isLoading = false;
                    this.message = 'An email was just sent to you';
                });
            }
        }
    }
</script>

<style scoped>

</style>