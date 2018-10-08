<template>
    <div>
        <mainframe>
            <section>
                <profil/>
                <form autocomplete="off" @submit.prevent="addcharacter" method="post">
                    <select v-model="zone">
                        <option>EU</option>
                        <option>KR</option>
                        <option>TW</option>
                        <option>US</option>
                    </select>
                    <select v-model="server">
                        <option v-for="server in servers" v-bind:value="server.name">
                            {{ server.name }}
                        </option>
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
    export default {
        name: "dashboard",
        components: {Profil, Mainframe}

    }
</script>

<style scoped>

</style>