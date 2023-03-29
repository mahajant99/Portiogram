var loginBtn = document.getElementById("login-btn");
var dropdownContent = document.querySelector(".dropdown-content");

window.onclick = function(event) {
    if (!event.target.matches('#login-btn')) {
        if (dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
        }
    }
}

// Login Page
function redirectToLogin() {
    window.location.href = "login.php";
  }