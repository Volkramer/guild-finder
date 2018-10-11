<template>
    <div>
        <mainframe>
            <section>
                <profil/>
                <AddCharacter/>
                <characterbox
                        v-for="character in characters"
                        v-bind:character="character"
                        :key="character.id"/>
            </section>
        </mainframe>
    </div>
</template>

<script>
    import axios from 'axios'
    import Mainframe from "./mainframe";
    import Profil from "./profil";
    import AddCharacter from "./addCharacter";
    import Characterbox from "./characterbox";

    export default {
        name: "dashboard",
        components: {Characterbox, AddCharacter, Profil, Mainframe},
        data() {
            return {
                characters: '',
                character: '',
                username: '',
                token: localStorage.token
            }
        },
        computed: {

        },
        mounted() {
            axios.get('api/auth/user', {
                headers: {
                    'Authorization': 'Bearer '+this.token
                }
            }).then(response => {
                axios.post('/api/character/read', {
                    username: response.data.username
                }).then(response => {
                    this.characters = response.data;
                    console.log(this.characters)
                })
            }).catch(error =>{
                console.log(error);
                this.hasErrors = true;
            });

        }
    }

</script>

<style scoped>

</style>