// Get Register Form
const registerForm = $("form#register"),loginForm = $("form#login");
// Check Exist RegisterForm
if (registerForm[0]) {
  registerForm[0].addEventListener("submit", e => DUPLICATE(e, "register", registerForm));
} else if (loginForm[0]) {
  loginForm[0].addEventListener("submit", e => DUPLICATE(e, "login", loginForm));
}
function DUPLICATE(e, page, form) {
  e.preventDefault();
  // Call Register.php (main back-end code) fetch
  fetch(`server/${page}.php?${page}=${JSON.stringify(form.serializeArray())}`);
}