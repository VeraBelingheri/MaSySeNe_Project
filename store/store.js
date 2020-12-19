export const state = () => ({
  session: null,
  name: "",
  idUser: null
});

// getters
export const getters = {
  // cartTotalPrice: (state, getters) => {
  //   return getters.cartProducts.reduce((total, product) => {
  //     return total + product.price * product.quantity
  //   }, 0)
  // }
};

// actions
export const actions = {
  async checkAuth({ commit, state }, { token, idUser, session }) {
    const params = new URLSearchParams();
    params.append("token", token);
    params.append("idUser", idUser);
    const result = await this.$axios.$post("checkAuth.php", params);
    if (state.session == null) {
      commit("setSessionType", session);
    }
    commit("setIdUser", idUser);
    commit("setUserName", state.session.getItem("socialBookName"));
    return result;
  },
  async loginInsecure({ commit }, { username, password, session }) {
    const params = new URLSearchParams();
    params.append("email", username);
    params.append("password", password);
    const result = await this.$axios.$post("login-insecure.php", params, {
      withCredentials: true
    });
    if (result.token) {
      result.session = session;
      commit("setSession", result);
      commit("setUserName", result.name);
    }
    return result.token;
  },
  async getPostsComments({ commit }) {
    const result = await this.$axios.$get("get-posts-and-comments.php");
    return result;
  },
  async addPostInsecure({ commit, state }, post) {
    const string =
      "?id=" +
      post.id +
      "&title=" +
      post.title +
      "&content=" +
      post.content +
      "&img=null";
    const result = await this.$axios.$get("new-post-insecure.php" + string, {
      withCredentials: true
    });
    return result;
  },
  async addCommentInsecure({ commit, state }, comment) {
    const params = new URLSearchParams();
    params.append("userId", state.idUser);
    params.append("id", comment.id);
    params.append("postId", comment.postId);
    params.append("comment", comment.content);
    const result = await this.$axios.$post("new-comment-insecure.php", params);
    return result;
  },
  async newUserInsecure({ commit, state }, { id, name, username, password }) {
    const params = new URLSearchParams();
    params.append("id", id);
    params.append("name", name);
    params.append("email", username);
    params.append("password", password);
    const result = await this.$axios.$post("registration-no-sha.php", params);
    return result;
  }
};

// mutations
export const mutations = {
  logout(state) {
    state.session.removeItem("socialBookIdUser");
    state.session.removeItem("socialBookToken");
    state.session.removeItem("socialBookName");
  },
  setSessionType(state, session) {
    state.session = session;
  },
  setSession(state, result) {
    result.session.setItem("socialBookIdUser", result.idUser);
    result.session.setItem("socialBookToken", result.token);
    result.session.setItem("socialBookName", result.name);
  },
  setIdUser(state, idUser) {
    state.idUser = idUser;
  },
  setUserName(state, name) {
    state.name = name;
  }
};
