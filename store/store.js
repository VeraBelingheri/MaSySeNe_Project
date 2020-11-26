export const state = () => ({
  session: null,
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
    let result;
    if (state.isAdmin == false) {
      result = await this.$axios.$post("storeowner/check-login.php", params);
      commit("setIdStore", result);
    } else {
      result = await this.$axios.$post("staff/check-login.php", params);
    }
    if (state.session == null) {
      commit("setSessionType", session);
    }
    commit("setIdUser", idUser);
    return result;
  },
  async login({ commit }, { username, password, session }) {
    const params = new URLSearchParams();
    params.append("username", username);
    params.append("password", password);
    const result = await this.$axios.$post("storeowner/login.php", params);
    commit("setIdStore", result.idStore);
    if (result.token) {
      result.session = session;
      commit("setSession", result);
    } else if (result.hasPassword == 0) {
      return "firstAcc";
    }
    return result.token;
  },
  async loginAdmin({ commit }, { username, password, session }) {
    const params = new URLSearchParams();
    params.append("username", username);
    params.append("password", password);
    const result = await this.$axios.$post("staff/login.php", params);
    if (result.token) {
      result.session = session;
      commit("setAdminUser", result.idUser);
      commit("setSession", result);
    }
    return result.token;
  },
  async changePassword({ commit, state }, { username, password }) {
    const params = new URLSearchParams();
    params.append("username", username);
    params.append("password", password);
    const result = await this.$axios.$post(
      "storeowner/change-password.php",
      params
    );
    // commit("logout");
    return result;
  }
};

// mutations
export const mutations = {
  logout(state) {
    state.session.removeItem("iFixIdUser");
    state.session.removeItem("iFixToken");
    state.session.removeItem("idUser");
    state.session.removeItem("idStore");
  },
  setSessionType(state, session) {
    state.session = session;
  },
  setSession(state, result) {
    result.session.setItem("iFixIdUser", result.idUser);
    result.session.setItem("iFixToken", result.token);
    result.session.setItem("isAdmin", state.isAdmin);
  },
  setIdUser(state, idUser) {
    state.idUser = idUser;
  },
  setAdminUser(state, idUser) {
    state.idUser = idUser;
    state.isAdmin = true;
  }
};
