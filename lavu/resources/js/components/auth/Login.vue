<template>
    <div>
        <h3>Login Form</h3>
        <form @submit.prevent="login">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="email" v-model="user.user_email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="pass" v-model="user.user_password">
            </div>
            <button type="submit" class="btn btn-light btn-block">Login</button>
        </form>
    </div>
</template>

<script>
  import Vue from 'vue'
  import VueCookies from 'vue-cookies'
  VueCookies.config('30d')

export default {
  data() {
    return {
      user: {
        user_email: 'dav@iniad.org',
        user_password: 'conmaxau',
      }
    };
  },

  methods: {
    login(){
      let vm = this;
      fetch('api/user/login', {
        method: 'post',
        body: JSON.stringify(this.user),
        headers: {
          'content-type': 'application/json'
        }
      })
        .then(res => res.json())
        .then(data => {
          this.parseData(data);
        })
        .catch(err => console.log(err));
    },

    parseData(data){
      VueCookies.set('user',data.data, "30d");
      this.$emit("save-user", data.data);
    }
  }
};
</script>
