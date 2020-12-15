<template>
  <div class="hero-body">
    <div class="container">
      <div class="login-container">
        <img src="~assets/img/socialbooks-logo.png" alt="Social-Books.com" />
        <LoginForm
          @data-error="loginError"
          @data-login="dataLogin"
          v-if="!registrate"
        />
        <RegistrationForm
          @data-error="loginError"
          @data-registration="newUser"
          v-else
        />
        <div class="field has-text-black is-size-5 mt-4">
          <b-checkbox v-model="registrate" type="is-info">
            I'm a new user!
          </b-checkbox>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginForm from "@/components/login/LoginForm";

export default {
  name: "Login",
  layout: "LoginPage",
  components: {
    LoginForm
  },
  data() {
    return {
      password: null,
      username: null,
      session: null,
      registrate: false
    };
  },
  methods: {
    dataLogin(username, password, session) {
      this.username = username;
      this.password = password;
      this.session = session;
      this.login();
    },
    async newUser(name, username, password) {
      const id = this.generateUUID();
      const res = await this.$store.dispatch("store/newUser", {
        id: id,
        name: name,
        username: username,
        password: password
      });
      this.registrate = false;
    },
    async login() {
      const username = this.username;
      const password = this.password;
      const session = this.session;
      const res = await this.$store.dispatch("store/login", {
        username: username,
        password: password,
        session: session
      });
      if (res == false) {
        this.loginError("Login error", "Email and/or password not valid");
      } else {
        this.$router.push("/");
      }
    },
    loginError(title, message) {
      this.$buefy.dialog.alert({
        title: title,
        message: message,
        type: "is-danger",
        ariaRole: "alertdialog",
        ariaModal: true
      });
    }
  }
};
</script>

<style scoped>
.login-container {
  max-width: 400px;
  margin: auto;
  background-color: #eee;
  border-radius: 1rem;
  padding: 1.5rem;
}
@media screen and (max-width: 768px) {
  .login-container {
    width: 100%;
  }
}
</style>
