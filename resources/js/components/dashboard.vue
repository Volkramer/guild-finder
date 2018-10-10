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
                character: ''
            }
        },
        created() {
            axios.post('/api/character/read', {
                'username': this.username
                }).then(response => {
                characters: response.data;
                console.log(response.data);
            })
        }
    }

</script>

<style scoped>

</style>