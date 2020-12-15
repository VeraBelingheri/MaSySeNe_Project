<template>
  <section class="form">
    <b-field label="Email">
      <b-input v-model="username" size="is-medium" type="email"></b-input>
    </b-field>
    <b-field label="Password">
      <b-input v-model="password" size="is-medium" type="password"></b-input>
    </b-field>
    <div class="field">
      <b-checkbox type="is-info" v-model="remember">Ricordami</b-checkbox>
    </div>
    <div class="has-text-centered">
      <b-button type="is-primary" size="is-medium" @click="login"
        >Login</b-button
      >
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      username: "",
      password: "",
      remember: true
    };
  },
  methods: {
    async login() {
      const username = this.username;
      const password = this.password;
      let session;
      if (this.remember == true) {
        session = localStorage;
      } else {
        session = sessionStorage;
      }
      if (username.length == 0 || password.length == 0) {
        this.$emit(
          "data-error",
          "Registration failed",
          "Email and/or password not valid. Try again."
        );
      } else {
        this.$emit("data-login", username, password, session);
      }
    }
  }
};
</script>

<style scoped>
.form {
  margin-top: 1rem;
  color: #333;
}
</style>
