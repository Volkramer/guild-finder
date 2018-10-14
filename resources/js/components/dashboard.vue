<template>
    <div>
        <mainframe>
            <section>
                <div class="profil">
                    <div class="block">
                        <img :src="image"/>
                        <p>Username: {{user.username}}</p>
                        <p>email: {{user.email}}</p>
                        <p>account created date: {{user.created_at}}</p>
                    </div>
                </div>
                <div class="add-character">
                    <div class="block">
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
                    </div>
                    <div class="block">
                        <form @submit.prevent="validCharacter" method="post">
                            <p>Character Name: {{character.name}}</p>
                            <p>Realm: {{character.realm}}</p>
                            <p>Lvl: {{character.level}}</p>
                            <p>Class: {{character.class}}</p>
                            <p>Race: {{character.race}}</p>
                            <p v-if="character.faction === 0">Faction: Alliance</p>
                            <p v-else-if="character.faction === 1">Faction: Horde</p>
                            <p v-else>Faction:</p>
                            <p>Guild: {{guild.name}}</p>
                            <div>
                                <button type="submit ">Validate</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    import Characterbox from "./characterbox";

    export default {
        name: "dashboard",
        components: {Characterbox, Mainframe},

        data() {
            return {
                characters: '',
                character: '',
                guild: '',
                token: localStorage.token,
                user: '',
                server: '',
                servers: '',
                zone: '',
                characterName: '',
                serverName: '',
            }
        },

        computed: {
            image() {
                return this.user.avatar_url;
            }
        },

        created() {
            axios.get('api/auth/user', {
                headers: {
                    'Authorization': 'Bearer ' + this.token
                }
            }).then(response => {
                this.user = response.data
            }).catch(error => {
                console.log(error);
                this.hasErrors = true;
            });
        },

        mounted() {
            axios.post('/api/character/read', {
                username: this.user.username
            }).then(response => {
                this.characters = response.data;
                console.log(this.characters)
            })
        },

        updated() {
            /*axios.post('/api/character/read', {
                username: this.user.username
            }).then(response => {
                this.characters = response.data;
                console.log(this.characters)
            })*/
        },

        methods: {
            onChangeZone() {
                axios.post('api/apiblizzard/getserver', {
                    zone: this.zone
                }).then(response => {
                    this.servers = response.data;
                }).catch(error => {
                    console.log(error);
                });
            },

            addCharacter() {
                axios.post('api/apiblizzard/getcharacter', {
                    zone: this.zone,
                    serverName: this.serverName,
                    characterName: this.characterName
                }).then(response => {
                    this.character = response.data;
                    this.guild = response.data.guild;
                }).catch(error => {
                    console.log(error);
                });
            },

            validCharacter() {
                axios.post('api/guild/create', {
                    username: this.user.username,
                    server: this.character.realm,
                    faction: this.character.faction,
                    guildName: this.guild.name
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(response.data);
                });
                axios.post('api/character/create', {
                    username: this.user.username,
                    characterName: this.character.name,
                    class: this.character.class,
                    race: this.character.race,
                    server: this.character.realm,
                    faction: this.character.faction,
                    lvl: this.character.level,
                    zone: this.zone,
                    guildName: this.guild.name
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
            },
        }
    }
</script>

<style scoped>
.block {
    border: white 2px solid;
}
</style>