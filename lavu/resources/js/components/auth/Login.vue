<template>
    <div>
        <h3>Login Form</h3>
        <form @submit.prevent="login">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="email" v-model="user.email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="pass" v-model="user.password">
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
        email: '',
        password: '',
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
      VueCookies.set('user',data, "30d");
      console.log(VueCookies.get('user'));
    }
  }
};
</script>
