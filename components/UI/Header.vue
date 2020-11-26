<template>
  <b-navbar class="custom-nav">
    <template slot="brand">
      <b-navbar-item tag="router-link" :to="{ path: '/' }">
        <img src="~assets/img/socialbooks-logo.png" alt="Social Books" />
      </b-navbar-item>
    </template>

    <template slot="end">
      <b-navbar-item tag="div">
        <div class="block">
          <ProfileHeader @logout="logout" />
        </div>
      </b-navbar-item>
    </template>
  </b-navbar>
</template>

<script>
import ProfileHeader from "@/components/profile/ProfileHeader";
export default {
  components: {
    ProfileHeader
  },
  methods: {
    logout() {
      this.$store.commit("store/logout");
      this.$router.push("/login");
    }
  }
};
</script>

<style scoped>
.icon-text {
  margin-left: 20px;
}
.icon {
  margin-top: 3px;
  position: absolute;
}
.navbar-brand > a {
  width: 80%;
  max-width: 300px;
}
.navbar-brand > a > img {
  max-height: 100px;
}
.custom-nav {
  -webkit-box-shadow: 0px 6px 5px -4px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 6px 5px -4px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 6px 5px -4px rgba(0, 0, 0, 0.15);
  z-index: 99;
}

@media screen and (max-width: 768px) {
  .navbar-brand > a {
    margin: auto;
  }
}
</style>
