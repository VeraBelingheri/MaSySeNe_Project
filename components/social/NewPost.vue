<template>
  <div class="mt-5">
    <b-field label="Titolo">
      <b-input v-model="post.title"></b-input>
    </b-field>
    <b-field label="Contenuto">
      <b-input v-model="post.content" maxlength="500" type="textarea"></b-input>
    </b-field>
    <div class="buttons mt-5">
      <b-button @click="$emit('save', post)" type="is-success" expanded
        >Publish</b-button
      >
    </div>
    <div class="buttons mt-5">
      <b-button @click="$emit('cancel')" type="is-warning" expanded
        >Cancel</b-button
      >
    </div>
  </div></template
>

<script>
export default {
  data() {
    return {
      post: {
        title: null,
        content: null
      }
    };
  }
};
</script>

<style></style>
