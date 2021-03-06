<?php
session_start();
require "DataBase.php";
$db = new DataBase();
$name = $_POST['name'];
$con = $db->dbConnect();
$sql = "SELECT * FROM products WHERE name='$name'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td class=\"product-image\">" . "<img src=" .   $row['image'] . " />" . "</td>";
    echo "<td>" . "<button class=\"tooltips\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"" . $row['info'] . "\"><i class=\"fas fa-info-circle\"></i></button>" . $row['type'] . "</td>";
    echo "<td>" . "PHP " . $row['price'] . "/KG" . "</td>";
    echo "<td>" . "<span class=\"quantity-input\">
        <button class=\"decrement\" id=\"" . $row['prod_id'] . "\"><i class=\"fas fa-angle-left\"></i></button>
        <span price=\"" . $row['price'] . "\" id=\"" . "quantity" . $row['prod_id'] . "\">0</span>
        <button class=\"increment\" id=\"" . $row['prod_id'] . "\">
        <i class=\"fas fa-angle-right\"></i></button></span>" . "</td>";
    echo "<td>" . "<span class=\"total\" id=\"total" . $row['prod_id'] . "\">TOTAL</span>" . "</td>";
    if ($row['availability']) {
        echo "<td>" . "<button class=\"add-to-cart\" id=\"" . $row['prod_id'] . "\">Add to cart</button>" . "</td>";
    } else echo "<td>Unavailable</td>";
    echo "</tr>";
    echo "<tr style=\"height:5px;\"/>";
}

?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".increment").click(function() {
            var id = $(this).attr('id');
            var price = $("#quantity" + id).attr('price');
            const quantitySpan = $("#quantity" + id);
            const totalSpan = $("#total" + id);
            const textToReplace = quantitySpan.text();
            const newQuantity = parseInt(textToReplace) + 1;
            const totalPrice = newQuantity * price
            quantitySpan.text(newQuantity);
            totalSpan.text("PHP " + totalPrice);
        });
        $(".decrement").click(function() {
            var id = $(this).attr('id');
            const quantitySpan = $("#quantity" + id);
            const textToReplace = quantitySpan.text();
            if (textToReplace == 0) {
                return;
            }
            var price = $("#quantity" + id).attr('price');
            const totalSpan = $("#total" + id);
            const newQuantity = parseInt(textToReplace) - 1;
            const totalPrice = newQuantity * price
            quantitySpan.text(newQuantity);
            totalSpan.text("PHP " + totalPrice);
        });
        jQuery(".add-to-cart").click(function() {
            $uid = "<?php echo $_SESSION['uid']; ?>";
            $pid = $(this).attr('id');
            $quantity = $("#quantity" + $pid).text();
            if ($quantity > 0) {
                jQuery.ajax({
                    url: "addToCart.php",
                    type: "POST",
                    data: {
                        pid: $pid,
                        quantity: $quantity,
                        uid:$uid,
                    },

                    success: function(result) {
                        alert("Added to cart");
                    },
                })
            }

        })
    });
</script>