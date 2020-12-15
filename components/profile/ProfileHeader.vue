<template>
  <div class="profile-container">
    <div class="profile">
      <div class="image-container">
        <img src="~assets/img/user-g.png" alt="" />
      </div>
      <p>
        {{ name }}
        <br />
        <b-button size="is-small" @click="logout()">Logout</b-button>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Alessio Crea"
    };
  },
  methods: {
    async logout() {
      this.$store.commit("store/logout");
      this.$router.push("login");
    }
  }
};
</script>

<style scoped>
.image-container {
  width: 50px;
  height: 50px;
  vertical-align: center;
  border: 2px solid #bd5532;
  border-radius: 1em;
  margin-right: 5px;
  display: flex;
}
.image-container > img {
  margin: auto;
}
.profile {
  padding: 0.5em 1em;
  display: flex;
}
.profile a {
  font-size: 0.8em;
}
.profile-container {
  color: rgba(189, 85, 50, 0.698);
  font-weight: bold;
  text-align: center;
  box-shadow: 0px 0px 5px 0px rgba(189, 85, 50, 1);
  border-radius: 1em;
  max-height: 80px;
}
</style>
