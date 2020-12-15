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
    return result;
  },
  async login({ commit }, { username, password, session }) {
    const params = new URLSearchParams();
    params.append("email", username);
    params.append("password", password);
    const result = await this.$axios.$post("login.php", params);
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
  async addPost({ commit, state }, post) {
    const params = new URLSearchParams();
    params.append("userId", state.idUser);
    params.append("id", post.id);
    params.append("title", post.title);
    params.append("content", post.content);
    params.append("img", post.img);
    const result = await this.$axios.$post("new-post.php", params);
    return result;
  },
  async addComment({ commit, state }, comment) {
    const params = new URLSearchParams();
    params.append("userId", state.idUser);
    params.append("id", comment.id);
    params.append("postId", comment.postId);
    params.append("comment", comment.content);
    const result = await this.$axios.$post("new-comment.php", params);
    return result;
  },
  async newUser({ commit, state }, { id, name, username, password }) {
    const params = new URLSearchParams();
    params.append("id", id);
    params.append("name", name);
    params.append("email", username);
    params.append("password", password);
    const result = await this.$axios.$post("registration.php", params);
    return result;
  }
};

// mutations
export const mutations = {
  logout(state) {
    state.session.removeItem("socialBookIdUser");
    state.session.removeItem("socialBookToken");
  },
  setSessionType(state, session) {
    state.session = session;
  },
  setSession(state, result) {
    result.session.setItem("socialBookIdUser", result.idUser);
    result.session.setItem("socialBookToken", result.token);
  },
  setIdUser(state, idUser) {
    state.idUser = idUser;
  },
  setUserName(state, name) {
    state.name = name;
  }
};
