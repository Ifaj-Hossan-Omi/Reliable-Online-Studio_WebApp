
// AJAX
function loadDoc() {
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function(){
      let data = JSON.parse(this.responseText);
      document.getElementById("preImg").src = data.logo;  
      document.getElementById("headName").innerHTML = data.logo;

  }
  xmlhttp.open("GET", "data.json", true);
  xmlhttp.send();
}

loadDoc();

function ValidateRegistration() {
    var password = document.getElementById("pass").value;
  
    if (password.length < 8) {
      alert("Password must be at least 4 characters long.");
      return false;
    }
  
    var email = document.getElementById("em").value;
          var atposition = email.indexOf("@");
          var dotposition = email.lastIndexOf(".");
          if (
            atposition < 1 ||
            dotposition < atposition + 2 ||
            dotposition + 2 >= email.length
          ) {
            alert("Please enter a valid e-mail address!!");
            return false;
          }
  }