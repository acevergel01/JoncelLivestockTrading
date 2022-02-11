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

$(document).ready(function () {
  selectProduct();
});

function selectProduct() {
  var j = jQuery.noConflict();
  var x = j("#products :selected").text();
  j.ajax({
    url: "products.php",
    type: "POST",
    data: {
      name: x,
    },
    success: function (result) {
      $("#table-body").html(result);
      $('[data-toggle="tooltip"]').tooltip();
    },
  });
}
