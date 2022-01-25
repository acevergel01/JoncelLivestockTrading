
function openLogin() {
  closeSignup();
  document.getElementById("id01").style.display = "block";
}

function closeLogin() {
  document.getElementById("id01").style.display = "none";
}
function openSignup() {
  console.log("OPEn")
  closeLogin();
  document.getElementById("id02").style.display = "block";
}

function closeSignup() {
  document.getElementById("id02").style.display = "none";
}
var modal = document.getElementById("id01");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
