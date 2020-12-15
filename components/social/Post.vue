<template>
  <section>
    <div v-if="!newComment">
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
              <time>{{ timestampToDate(timestamp) }}</time>
            </div>
          </div>
          <footer class="card-footer">
            <a @click="newComment = !newComment" class="card-footer-item"
              >Commenta</a
            >
          </footer>
        </div>
        <div v-if="comments.length > 0" class="comments mt-2">
          <Comment
            v-for="c in comments"
            :key="c.id"
            :comment="c.comment"
            :user="c.user.name"
          />
        </div>
      </div>
    </div>
    <div v-else>
      <NewComment
        :postId="postId"
        @save="addComment"
        @cancel="newComment = !newComment"
      />
    </div>
  </section>
</template>
<script>
import Comment from "@/components/social/Comment";
import NewComment from "@/components/social/NewComment";
export default {
  components: {
    Comment,
    NewComment
  },
  props: {
    postTitle: {
      type: String
    },
    postBody: {
      type: String
    },
    user: {
      type: String
    },
    timestamp: {
      type: String
    },
    comments: {
      type: Array,
      default: []
    },
    postId: {
      type: String
    }
  },
  data() {
    return {
      userProfileImage: require("~/assets/img/user-g.png"),
      newComment: false
    };
  },
  methods: {
    timestampToDate(timestamp) {
      return new Date(timestamp).toLocaleString("it-IT");
    },
    async addComment(content) {
      let comment = {};
      comment.id = this.generateUUID();
      comment.postId = this.postId;
      comment.content = content;
      const res = await this.$store.dispatch("store/addComment", comment);
      this.newComment = false;
      this.$emit("reload");
    }
  }
};
</script>

<style scoped>
.post {
  border-radius: 1em;
}
</style>
