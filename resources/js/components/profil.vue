<template>
    <div class="profil">
        <img :src="image"/>
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

        computed: {
            image(){
                return this.user.avatar_url;
            }
        },
        created(){
            axios.get('api/auth/user', {
                headers: {
                    'Authorization': 'Bearer '+this.token
                }
            }).then(response => {
                this.user = response.data
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