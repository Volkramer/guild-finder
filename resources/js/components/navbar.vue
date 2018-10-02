<template>
  <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <router-link :to="{ name: 'home' }" class="navbar-item"><h1>GUILD FINDER</h1></router-link>
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div class="navbar-start">
      <div class="control is-small is-loading">
        <input class="input is-small" type="text" placeholder="Rechercher">
      </div>
    </div>
    <div class="navbar-end">
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><router-link :to="{ name: 'signin.vue' }" v-if="!isLoggedIn">Login</router-link></li>
          <li><router-link :to="{ name: 'register' }" v-if="!isLoggedIn">Register</router-link></li>
          <span v-if="isLoggedIn">
            <li><router-link :to="{ name: 'profil' }" v-if="user_type == 0"> Hi, {{username}}</router-link></li>
            <li><router-link :to="{ name: 'admin' }" v-if="user_type == 1"> Hi, {{username}}</router-link></li>
          </span>
          <li class="nav-link" v-if="isLoggedIn" @click="logout">Logout</li>
        </ul>
      </nav>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      name: null,
      user_type: 0,
      isLoggedIn: localStorage.getItem('userToken.jwt') != null
    }
  },
  mounted() {
    this.setDefaults()
  },
  methods : {
    setDefaults() {
      if (this.isLoggedIn) {
        let user = JSON.parse(localStorage.getItem('userToken.user'))
        this.name = user.name
        this.user_type = user.is_admin
      }
    },
    change() {
      this.isLoggedIn = localStorage.getItem('userToken.jwt') != null
      this.setDefaults()
    },
    logout(){
      localStorage.removeItem('userToken.jwt')
      localStorage.removeItem('userToken.user')
      this.change()
      this.$router.push('/')
    }
  }
}
</script>

<style>
h1 {
  font-family: LifeCraft;
  color: white;
}
</style>
