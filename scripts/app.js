// Get Register Form
const registerForm = $("form#register");
const loginForm = $("form#login");
// Create empty let for create url and send to back-end
let information, url;

// Check Exist RegisterForm
if (registerForm[0]) {
  registerForm[0].addEventListener("submit", (e) => {
    // Off Default Prevent
    e.preventDefault();
    // Get Form inputs value and create array
    information = registerForm.serializeArray();
    // Import True URL :)
    url = `http://localhost/git/test0/server/register.php?register=${JSON.stringify(
      information
    )}`;

    // Call Register.php (main back-end code) ajax
    $.ajax(url, {
      // Sended Data Type
      dataType: "json",
      // Payload for trust
      body: information,
      // After Success Call
      success: function (data, status, xhr) {
        console.log("PayLoad : ", data);
        console.log("Status : ", status);
        console.log("Response : ", xhr);
      },
      // After Error Call
      error: function (data, status, xhr) {
        console.error("PayLoad : ", data);
        console.error("Status : ", status);
        console.error("Response : ", xhr);
      },
    });
  });
} else if (loginForm[0]) {
  loginForm[0].addEventListener("submit", (e) => {
    // Off Default Prevent
    e.preventDefault();
    // Get Form inputs value and create array
    information = loginForm.serializeArray();
    // Import True URL :)
    url = `http://localhost/git/test0/server/login.php?login=${JSON.stringify(
      information
    )}`;

    console.log(url);

    // Call Register.php (main back-end code) ajax
    $.ajax(url, {
      // Sended Data Type
      dataType: "json",
      // Payload for trust
      body: information,
      // After Success Call
      success: function (data, status, xhr) {
        console.log("PayLoad : ", data);
        console.log("Status : ", status);
        console.log("Response : ", xhr);
      },
      // After Error Call
      error: function (data, status, xhr) {
        console.error("PayLoad : ", data);
        console.error("Status : ", status);
        console.error("Response : ", xhr);
      },
    });
  });
}
