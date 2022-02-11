
function selectProduct() {
  var j = jQuery.noConflict();
  var x = $('#products :selected').text();
  j.ajax({
      url: "products.php",
      type: "POST",
      data: {
          name: x
      },
      success: function(result) {
          $("#table-body").html(result);
      },
  })
}