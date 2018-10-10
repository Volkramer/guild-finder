<template>
    <div class="block">
        <p>Character Name: {{character.name}}</p>
        <p>Realm: {{character.realm}}</p>
        <p>Lvl: {{character.level}}</p>
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
            character: ''
        }
    }
</script>

<style scoped>
    .block{
        border: white 2px solid;
    }
</style>