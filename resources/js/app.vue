<template>
  <div id="vueapp">
    <navbar/>
    <router-view/>
  </div>
</template>

<script>
import navbar from './components/navbar'
export default {
  name: 'app',
  components: {
    navbar
  }
}
</script>

<style>
  body {
    background-image: url("/assets/images/fonds.png");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    margin:0;
    padding:0;
    height: 100vh;
  }
</style>
