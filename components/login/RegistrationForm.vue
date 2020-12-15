<template>
  <section class="form">
    <b-field label="Name">
      <b-input v-model="name" size="is-medium" required></b-input>
    </b-field>
    <b-field label="Email">
      <b-input
        v-model="username"
        size="is-medium"
        type="email"
        required
      ></b-input>
    </b-field>
    <b-field label="Password">
      <b-input
        v-model="password"
        size="is-medium"
        type="password"
        required
      ></b-input>
    </b-field>
    <div class="has-text-centered">
      <b-button type="is-primary" size="is-medium" @click="register"
        >SignUp</b-button
      >
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      username: "",
      password: ""
    };
  },
  methods: {
    async register() {
      const name = this.name;
      const username = this.username;
      const password = this.password;
      if (name.length == 0 || username.length == 0 || password.length == 0) {
        this.$emit(
          "data-error",
          "Registration failed",
          "Email and/or password not valid. Try again."
        );
      } else {
        this.$emit("data-registration", name, username, password);
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
