<template>
    <div>
        <mainframe>
            <section>
                <profil/>
                <form autocomplete="off" @submit.prevent="addcharacter" method="post">
                    <select v-model="zone" @change="onChangeZone">
                        <option value="" selected>Your geographical zone</option>
                        <option value="eu">EU</option>
                        <option value="kr">KR</option>
                        <option value="tw">TW</option>
                        <option value="us">US</option>
                    </select>
                    <select v-model="server">
                        <option value="" selected>Choose your server</option>
                        <option v-for="server in servers.realms" :value="server.slug">{{server.name}}</option>
                    </select>
                    <div class="form-group">
                        <label>Character Name</label>
                        <input type="text" id="character-name" v-model="characterName">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </form>

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
                characterName: ''
            }
        },
        computed: {

        },
        methods: {
            onChangeZone(){
                axios.post('api/apiblizzard/server', {
                    zone: this.zone
                }).then(response => {
                    this.servers=response.data;
                    console.log(JSON.parse(JSON.stringify(this.servers)));
                }).catch(error =>{
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>