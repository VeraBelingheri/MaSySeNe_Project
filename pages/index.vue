<template>
  <div class="container">
    <div v-if="!newPost">
      <div class="buttons mt-5">
        <b-button @click="newPost = !newPost" type="is-primary" expanded
          >New Post</b-button
        >
      </div>
      <Post
        v-for="p in posts"
        :key="p.postId"
        :postId="p.postId"
        :postTitle="p.postTitle"
        :postBody="p.postContent"
        :user="p.user.name"
        :timestamp="p.timestamp"
        :comments="p.comments"
        @reload="getPosts"
      />
    </div>
    <div v-else>
      <NewPost @save="addPost" @cancel="newPost = !newPost" />
    </div>
  </div>
</template>

<script>
import Post from "@/components/social/Post";
import NewPost from "@/components/social/NewPost";

export default {
  components: {
    Post,
    NewPost
  },
  data() {
    return {
      posts: [],
      newPost: false
    };
  },
  async mounted() {
    await this.getPosts();
  },
  methods: {
    async addPost(post) {
      this.newPost = false;
      post.id = this.generateUUID();
      post.img = null;
      const res = await this.$store.dispatch("store/addPostInsecure", post);
      await this.getPosts();
    },
    async getPosts() {
      const posts = await this.$store.dispatch("store/getPostsComments");
      this.posts = posts;
      return true;
    }
  }
};
</script>

<style></style>
