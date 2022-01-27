
function openLogin() {
  closeSignup();
  document.getElementById("id01").style.display = "block";
}

function closeLogin() {
  document.getElementById("id01").style.display = "none";
}
function openSignup() {
  closeLogin();
  document.getElementById("id02").style.display = "block";
}

function closeSignup() {
  document.getElementById("id02").style.display = "none";
}
var modal = document.getElementById("id02");
var span = document.getElementsByClassName("close")[0];


span.onclick = function() {
  openLogin();
}
