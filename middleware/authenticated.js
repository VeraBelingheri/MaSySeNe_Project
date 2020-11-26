export default async function(context) {
  if (process.browser) {
    // const ls = localStorage;
    // const ss = sessionStorage;
    // if (!ls.getItem("iFixToken") && !ss.getItem("iFixToken")) {
    //   context.redirect("/login");
    // } else {
    //   let token, idUser, session, isAdmin;
    //   if (ls.getItem("iFixToken")) {
    //     token = ls.getItem("iFixToken");
    //     idUser = ls.getItem("iFixIdUser");
    //     isAdmin = ls.getItem("isAdmin");
    //     session = ls;
    //   } else {
    //     token = ss.getItem("iFixToken");
    //     idUser = ss.getItem("iFixIdUser");
    //     isAdmin = ss.getItem("isAdmin");
    //     session = ss;
    //   }
    //   const result = await context.store.dispatch("store/checkAuth", {
    //     token: token,
    //     idUser: idUser,
    //     session: session
    //   });
    // if (result == false && context.route.name != "login") {
    //   context.redirect("/login");
    // } else if (
    //   context.route.name == "login" ||
    //   context.route.name == "index"
    // ) {
    //   context.redirect("/store");
    // }
    // }
  }
}
