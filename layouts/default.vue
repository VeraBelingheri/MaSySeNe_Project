<template>
  <section>
    <Header />
    <div class="columns is-variable is-0-mobile is-0-tablet main-container">
      <div class="column is-3"></div>
      <div class="column is-6">
        <nuxt />
      </div>
    </div>
  </section>
</template>

<script>
import Header from "@/components/UI/Header";
import Skeleton from "@/components/UI/Skeleton";

export default {
  head() {
    return {
      title: "Social Books"
    };
  },
  middleware: "authenticated",
  components: {
    Header,
    Skeleton
  },
  data() {
    return {};
  }
};
</script>

<style scoped>
.main-container {
  background: #eee;
  min-height: 100vh;
}
</style>
