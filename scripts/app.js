// Get Register Form
const registerForm = $("form#register"),
  loginForm = $("form#login");
// Create empty let for create url and send to back-end
let information, url;
// Check Exist RegisterForm
if (registerForm[0]) {
  registerForm[0].addEventListener("submit", (e) => {
    DUPLICATE(e, "register", registerForm);
  });
} else if (loginForm[0]) {
  loginForm[0].addEventListener("submit", (e) => {
    DUPLICATE(e, "login", loginForm);
  });
}
function DUPLICATE(e, page, form) {
  e.preventDefault();
  // Get Form inputs value and create array
  information = form.serializeArray();
  // Create URL
  url = `server/${page}.php?${page}=${JSON.stringify(information)}`;
  // Call Register.php (main back-end code) ajax
  $.ajax(url);
}
