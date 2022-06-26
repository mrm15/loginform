const registerForm = $("form#register"),loginForm = $("form#login");
if (registerForm[0]) 
  registerForm[0].addEventListener("submit", e => DUPLICATE(e, "register", registerForm));
  else if (loginForm[0]) 
  loginForm[0].addEventListener("submit", e => DUPLICATE(e, "login", loginForm));
function DUPLICATE(e, page, form) {
  e.preventDefault();
  fetch(page === "register" ? `server/${page}.php?${page}=${JSON.stringify(form.serializeArray())}` : 
  `../server/${page}.php?${page}=${JSON.stringify(form.serializeArray())}`)
}