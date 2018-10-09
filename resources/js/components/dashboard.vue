<template>
    <div>
        <mainframe>
            <section>
                <profil/>
                <form @submit.prevent="addCharacter" method="post">
                    <select v-model="zone" @change="onChangeZone">
                        <option value="" selected>Your geographical zone</option>
                        <option value="eu">EU</option>
                        <option value="kr">KR</option>
                        <option value="tw">TW</option>
                        <option value="us">US</option>
                    </select>
                    <select v-model="serverName">
                        <option value="" selected>Choose your server</option>
                        <option v-for="server in servers.realms" v-bind:value="server.slug">{{server.name}}</option>
                    </select>
                    <div class="form-group">
                        <label>Character Name</label>
                        <input type="text" id="character-name" v-model="characterName">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </form>
                <div>
                <form @submit.prevent="validCharacter" method="post">
                    <p>Character Name: {{character.name}}</p>
                    <p>Realm: {{character.realm}}</p>
                    <p>Lvl: {{character.level}}</p>
                    <p>Class: {{character.class}}</p>
                    <p>Race: {{character.race}}</p>
                    <p v-if="character.faction == 0">Faction: Alliance</p>
                    <p v-else-if="character.faction == 1">Faction: Horde</p>
                    <p v-else>Faction:</p>
                    <div>
                        <button type="submit ">Validate</button>
                    </div>
                </form>
                </div>
            </section>
        </mainframe>
    </div>
</template>

<script>
    import Mainframe from "./mainframe";
    import Profil from "./profil";
    import axios from "axios";
    export default {
        name: "dashboard",
        components: {Profil, Mainframe},
        data(){
            return{
                server: '',
                servers: '',
                zone: '',
                characterName: '',
                character: '',
                serverName: '',
            }
        },
        computed: {

        },
        methods: {
            onChangeZone(){
                axios.post('api/apiblizzard/getserver', {
                    zone: this.zone
                }).then(response => {
                    this.servers=response.data;
                }).catch(error =>{
                    console.log(error);
                });
            },

            addCharacter(){
                axios.post('api/apiblizzard/getcharacter', {
                    zone: this.zone,
                    serverName: this.serverName,
                    characterName: this.characterName
                }).then(response => {
                    this.character=response.data;
                }).catch(error =>{
                    console.log(error);
                });
            }

        }
    }
</script>

<style scoped>

</style>