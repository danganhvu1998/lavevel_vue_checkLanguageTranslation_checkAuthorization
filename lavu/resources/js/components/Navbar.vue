<template>
  <nav class="navbar navbar-expand-sm navbar-dark bg-success mb-2">
    <div class="container">
      <a href="/write" class="navbar-brand">Write</a>
      <a href="/home" class="navbar-brand">Read</a>
      <a v-if="appUser.id==0" href="/" class="navbar-brand">Auth</a>
      <a v-if="appUser.id>0" @click="logout" class="btn btn-warning">Logout</a>
      <span v-if="appUser.id>0" class="btn btn-primary">{{appUser.name}}</span>
    </div>
  </nav>
</template>

<script>
import VueCookies from 'vue-cookies'
export default {
  props: ["appUser"],
  methods: {
    logout(){
      VueCookies.remove('user');
      location.replace("/");
    }
  },
}
</script>

