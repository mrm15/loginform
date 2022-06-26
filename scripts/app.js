const registerForm = $("form#register"),loginForm = $("form#login");

const captcha = document.querySelector("#captcha");
const userCode = document.querySelector("#userCode");

const captchaCode = Math.floor(Math.random() * 123456);
captcha.value = captchaCode;

if (registerForm[0])
  registerForm[0].addEventListener("submit", (e) =>
    DUPLICATE(e, "register", registerForm)
  );
else if (loginForm[0])
  loginForm[0].addEventListener("submit", (e) =>
    DUPLICATE(e, "login", loginForm)
  );
function DUPLICATE(e, page, form) {
  e.preventDefault();
  const information = JSON.stringify(form.serializeArray());

  if (captcha.value === userCode.value) {
    fetch(
      page === "register"
        ? `server/${page}.php?${page}=${information}`
        : `../server/${page}.php?${page}=${information}`
    )
      .then((response) => response.json())
      .then((response) => {
        Swal.fire({
          icon: "info",
          title: response.data,
        });
      });
  } else {
    Swal.fire({
      icon: "error",
      title: "درست وارد کن بچه :|",
    });
  }
}


// (B) PREVENT CLIPBOARD COPYING
document.addEventListener("copy", (evt) => {
  // (B1) CHANGE THE COPIED TEXT IF YOU WANT
  evt.clipboardData.setData("بشین تا کپی شه :)");
 
  // (B2) PREVENT THE DEFAULT COPY ACTION
  evt.preventDefault();
}, false);
