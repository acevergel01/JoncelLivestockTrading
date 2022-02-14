function openNav() {
  document.getElementById("mySidenav").style.width = "400px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function editData() {
  $("input").prop("disabled", false);
  $("#logout").html("Save");
  $("#logout").off("click");
  $("#logout").click(function () {
    saveData();
  });
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
        success: function(data) {
            if (data == "Success") {
                $("input").prop("disabled", true);
                $("#logout").html("Logout");
                $("#logout").off("click");
                $("#logout").click(function() {
                    logout();
                });
                return;
            }
        },
    });
}
