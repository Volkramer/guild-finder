<template>
    <div class="block">
        <p>Character Name: {{character.character_name}}</p>
        <p>Realm: {{character.server}}</p>
        <p>Lvl: {{character.lvl}}</p>
        <p>Class: {{character.class}}</p>
        <p>Race: {{character.race}}</p>
        <p>Faction: {{character.faction}}</p>
    </div>
</template>

<script>
    export default {
        name: "characterbox",
        props: ['character'],
        data(){
            return {

            }
        }
    }
</script>

<style scoped>
    .block{
        border: white 2px solid;
    }
</style>