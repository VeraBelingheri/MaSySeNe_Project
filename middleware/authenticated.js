export default async function(context) {
  if (process.browser) {
    const ls = localStorage;
    const ss = sessionStorage;
    if (!ls.getItem("socialBookToken") && !ss.getItem("socialBookToken")) {
      context.redirect("/login");
    } else {
      let token, idUser, session, isAdmin;
      if (ls.getItem("socialBookToken")) {
        token = ls.getItem("socialBookToken");
        idUser = ls.getItem("socialBookIdUser");
        session = ls;
      } else {
        token = ss.getItem("socialBookToken");
        idUser = ss.getItem("socialBookIdUser");
        session = ss;
      }
      const result = await context.store.dispatch("store/checkAuth", {
        token: token,
        idUser: idUser,
        session: session
      });
      if (result == false) {
        context.redirect("/login");
      } else if (
        context.route.name == "login" ||
        context.route.name == "registration"
      ) {
        context.redirect("/");
      }
    }
  }
}
