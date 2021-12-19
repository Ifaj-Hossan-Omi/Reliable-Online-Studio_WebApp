/*==================== SHOW NAVBAR ====================*/
// const showMenu = (headerToggle, navbarId) =>{
//     const toggleBtn = document.getElementById(headerToggle),
//     nav = document.getElementById(navbarId)
    
//     // Validate that variables exist
//     if(headerToggle && navbarId){
//         toggleBtn.addEventListener('click', ()=>{
//             // We add the show-menu class to the div tag with the nav__menu class
//             nav.classList.toggle('show-menu')
//             // change icon
//             toggleBtn.classList.toggle('bx-x')
//         })
//     }
// }
// showMenu('header-toggle','navbar')

// /*==================== LINK ACTIVE ====================*/
// const linkColor = document.querySelectorAll('.nav__link')

// function colorLink(){
//     linkColor.forEach(l => l.classList.remove('active'))
//     this.classList.add('active')
// }

// linkColor.forEach(l => l.addEventListener('click', colorLink))

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