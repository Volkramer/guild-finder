<template>
    <div>
        <mainframe>
            <section>
                <profil/>
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