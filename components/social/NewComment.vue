<template>
  <div class="mt-5">
    <b-field label="Commento">
      <b-input v-model="comment" maxlength="500" type="textarea"></b-input>
    </b-field>
    <div class="buttons mt-5">
      <b-button @click="$emit('save', comment)" type="is-success" expanded
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
      comment: null
    };
  },
  props: {
    postId: {
      type: String
    }
  }
};
</script>

<style></style>
