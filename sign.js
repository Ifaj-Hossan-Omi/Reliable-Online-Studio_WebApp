const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".main-container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
function ValidateRegistration() {
  let flag = true;

  var password = document.getElementById("pass").value;
  document.getElementById("errorEmail").innerHTML = "";
  document.getElementById("errorPass").innerHTML = "";

  if (password.length < 8) {
      document.getElementById("errorPass").innerHTML = "Password Must be 8 character long";
      // return false;
      flag = false;
  }

  var email = document.getElementById("em").value;
  var atposition = email.indexOf("@");
  var dotposition = email.lastIndexOf(".");
  if (
      atposition < 1 ||
      dotposition < atposition + 2 ||
      dotposition + 2 >= email.length
  ) {
      // alert("Please enter a valid e-mail address!!");
      document.getElementById("errorEmail").innerHTML = "Please enter a valid e-mail address";
      // return false;
      flag = false;
  }
  if (flag == false) {
      return false;
  }
  return true;
}