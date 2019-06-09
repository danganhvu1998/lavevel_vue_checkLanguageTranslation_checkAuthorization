<template>
  <nav class="navbar navbar-expand-sm navbar-dark bg-success mb-2">
    <div class="container">
      <a href="#" class="navbar-brand">Write</a>
      <a href="#" class="navbar-brand">Read</a>
      <a href="#" class="navbar-brand">Auth</a>
      <span class="btn btn-primary">{{appUser.name}}</span>
    </div>
  </nav>
</template>

<script>
export default {
  props: ["appUser"],
}
</script>

