function openNav() {
  document.getElementById("profileMenu").style.width = "400px";
}
function closeNav() {
  document.getElementById("profileMenu").style.width = "0";
}

function editData() {
  $("input").prop("disabled", false);
  $("#logout").off("click");
  $("#logout").click(function () {
    saveData();
  });
  $("#logout").html("Save");
}

function logout() {
  window.location.href = "logout.php";
}

function saveData() {
  jQuery.ajax({
    url: "updateUser.php",
    type: "POST",
    data: {
      username: $("#username").val(),
      address: $("#address").val(),
      number: $("#number").val(),
      email: $("#email").val(),
      name: $("#name").val(),
      id: $id,
    },
    success: function (data) {
      if (data == "Success") {
        $("input").prop("disabled", true);
        $("#logout").off("click");
        $("#logout").click(function () {
          logout();
        });
        $("#logout").html("Logout");
        return;
      }
    },
  });
}
