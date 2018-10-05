<template>
    <div class="profil">
        <img v-bind:src=require(user.avatar_url)/>
        <p>Username: {{user.username}}</p>
        <p>email: {{user.email}}</p>
        <p>account created date: {{user.created_at}}</p>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "profil",
        data() {
            return {
                token: localStorage.token,
                user:'',
            }
        },

        computed: {},
        created(){
            axios.get('api/auth/user', {
                headers: {
                    'Authorization': 'Bearer '+this.token
                }
            }).then(response => {
                this.user = response.data
                console.log(this.user)
            }).catch(error =>{
                console.log(error);
                this.hasErrors = true;
            });
        }
    }
</script>

<style scoped>
    .profil{
        border: white 5px solid;
    }
</style>