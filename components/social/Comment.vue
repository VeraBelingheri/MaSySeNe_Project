<template>
  <div class="comment-container">
    <p class="is-size-5 has-text-weight-bold">
      {{ user }}
    </p>
    <p>{{ comment }}</p>
  </div>
</template>

<script>
export default {
  props: {
    comment: {
      type: String
    },
    user: {
      type: String
    }
  }
};
</script>

<style scoped>
.comment-container {
  width: 90%;
  margin: 0.5em auto;
  padding: 0.5em;
  background-color: #fff;
  border-bottom-left-radius: 1em;
  border-bottom-right-radius: 1em;
}
</style>
