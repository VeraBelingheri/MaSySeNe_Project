<template>
  <div class="mt-5">
    <div class="card post">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <img :src="userProfileImage" alt="Profile Image" />
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">{{ user }}</p>
          </div>
        </div>

        <div class="content">
          <h2 class="title is-5">{{ postTitle }}</h2>
          {{ postBody }}
          <br />
          <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">Commenta</a>
      </footer>
    </div>
    <div v-if="hasComments" class="comments mt-2">
      <Comment />
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      hasComments: true,
      user: "Alessio Crea",
      userProfileImage: require("~/assets/img/user-g.png"),
      postTitle: "12 Rules for life",
      postBody:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dicta repellat ex dolorum tempore repudiandae perferendis voluptate voluptatibus adipisci in sapiente laudantium culpa distinctio quos doloribus labore, ut totam deserunt?"
    };
  }
};
</script>

<style scoped>
.post {
  border-radius: 1em;
}
</style>
