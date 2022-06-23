let url = "http://alitest.freehost.io/Login-Register-master/server/";

const backBtn = document.querySelector("#back");

const registerForm = document.querySelector("form#register");
const loginForm = document.querySelector("form#login");
const rememberForm = document.querySelector("form#remember");
const modifiedForm = document.querySelector("form#modified");

if (backBtn) {
  backBtn.addEventListener("click", (_) => {
    if (history.back()) {
      alert();
    }
  });
}

if (registerForm) {

  registerForm.addEventListener("submit", (e) => {

    e.preventDefault();

    let registerInfo = $("form#register").serializeArray();
    // registerInfo = JSON.stringify(registerInfo);

    url = "http://localhost/loginplz/server/register.php?register=register"+JSON.stringify({registerInfo});
    console.log(url);

    // fetch(url,{method: "GET"}).then(response => response)
    //   .then(response => {
    //     console.log(response);
    //     return response.data
    //
    //   }).then(response => {console.log(response)})

    $.ajax({
      async: true,
      type: "post",
      url: "http://localhost/loginplz/server/register.php",
      data: "register=" + JSON.stringify(registerInfo),
      cache: false,
      processData: false,

      timeout: 30000,
      success: function (data) {
        console.log("success")
      },

    }).done(function(data){
      // let successMsg = document.querySelector(".success-Msg");
      // let form = document.getElementById('signInForm');
      // successMsg.innerText = " ";
      // successMsg.style.fontSize = "10px";
      // successMsg.style.display = "block";
      // dataSet = JSON.parse(data);
      //
      // if (dataSet.status) {
      //   successMsg.innerText = "ثبت نام شما با موفقیت انجام شد."
      //   successMsg.style.color = "#2ed573";
      //   form.reset();
      //   window.setTimeout(function(){
      //     successMsg.innerText = " ";
      //     window.location.assign("publicuser-login.php")
      //   },2000)

      // }
      // else {
      //   successMsg.innerText = " لطفا مجددا تلاش کنید";
      //   successMsg.style.color = "red";
      // }
      console.log(data)
    });



  });
} else if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    alert()
    e.preventDefault();

    let loginInfo = $("form#login").serializeArray();
    loginInfo = JSON.stringify(loginInfo);

    url = "http://alitest.freehost.io/Login-Register-master/server/login.php?login=" + loginInfo

    fetch(url).then(response => response)
      .then(response => {
        if (response.status === 200) {
          alert("success", "خب ، عالیه")
        } else {
          alert("error", "خب ، افتظاحه")
        }
      })


  });
} else if (rememberForm) {
  rememberForm.addEventListener("submit", (e) => {
    alert()
    e.preventDefault();

    let rememberPass = $("form#remember").serializeArray();
    rememberPass = JSON.stringify(rememberPass);

    url = "http://alitest.freehost.io/Login-Register-master/server/forgetpassword.php?forgetpassword=" + rememberInfo

    fetch(url).then(response => response)
      .then(response => {
        if (response.status === 200) {
          alert("success", "خب ، عالیه")
        } else {
          alert("error", "خب ، افتظاحه")
        }
      })

  });
} else if (modifiedForm) {
  modifiedForm.addEventListener("submit", (e) => {
    alert()
    e.preventDefault();

    let modifiedInfo = $("form#modified").serializeArray();
    modifiedInfo = JSON.stringify(modifiedInfo);

    url = "http://alitest.freehost.io/Login-Register-master/server/updatepass.php?update=" + modifiedInfo

    fetch(url).then(response => response)
      .then(response => {
        if (response.status === 200) {
          alert("success", "خب ، عالیه")
        } else {
          alert("error", "خب ، افتظاحه")
        }
      })

  });
}


function alert(icon, text) {
  Swal.fire({
    icon: icon,
    title: text,
    confirmButtonText: "اوکی",
  }
  )
}
