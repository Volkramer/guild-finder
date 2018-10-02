<template>
  <div>
    <mainframe>
      <div>
        <form autocomplete="off" @submit.prevent="login" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="password" required>
          </div>
          <button type="submit" class="btn btn-default">Sign in</button>
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
        login() {
            if (this.isDisabled) {
                return false
            }

            this.isLoading = true;
            this.hasErrors = false;

            axios
                .post('api/auth/login', {
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    this.isLoading = false;
                    console.log(response)
                })
        }
    }
}
</script>

<style>

</style>
