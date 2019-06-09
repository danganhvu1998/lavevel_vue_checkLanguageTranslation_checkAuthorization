<template>
    <div>
        <h3>Register Form</h3>
        <form @submit.prevent="register">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="name" v-model="newUser.name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="email" v-model="newUser.email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="pass" v-model="newUser.password">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="re_pass" v-model="rePassword">
            </div>
            <button type="submit" class="btn btn-light btn-block">Register</button>
        </form>
    </div>
</template>

<script>
  import Vue from 'vue'
  import VueCookies from 'vue-cookies'
  VueCookies.config('30d')

export default {
  props:["app-user"],
  data() {
    return {
      newUser: {
        name: '',
        email: '',
        password: '',
      },
      rePassword: '',
    };
  },

  created() {
    this.fillInput();
  },

  methods: {
    fillInput(){
      this.newUser.name = "Dang Anh Vu";
      this.newUser.email = "dav@iniad.org";
      this.newUser.password = "conmaxau";
      this.rePassword = "conmaxau";
    },
    register(){      
      let vm = this;
      fetch('api/user/register', {
        method: 'post',
        body: JSON.stringify(this.newUser),
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
