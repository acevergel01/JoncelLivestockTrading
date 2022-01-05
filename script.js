
function openLogin() {
  console.log("Open");
  document.getElementById("frmLogin").style.display = "block";
}

function closeLogin() {
  document.getElementById("frmLogin").style.display = "none";
}
function openSignup() {
  document.getElementById("signup").style.display = "block";
}

function closeSignup() {
  document.getElementById("signup").style.display = "none";
}
var modal = document.getElementById("id01");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
