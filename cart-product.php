<?php
session_start();
require "DataBase.php";
$db = new DataBase();
$con = $db->dbConnect();
$sql = "SELECT pid,quantity FROM cart WHERE uid='1'";
$result = mysqli_query($con, $sql);
$subTotal = 0;
$deliveryFee = 0;
while ($row = mysqli_fetch_array($result)) {
    $pid = $row['pid'];
    $quantity = $row['quantity'];
    $sql = "SELECT * FROM products WHERE prod_id='$pid'";
    $result2 = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result2)) {
        $total = $quantity * $row['price'];
        $subTotal += $total;
        echo "<tr >";
        echo "<td>" . "<img src=" .   $row['image'] . " />" . "</td>";
        echo "<td>" . "<button class=\"tooltips\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"" . $row['info'] . "\"><i class=\"fas fa-info-circle\"></i></button>" . $row['type'] . "</td>";
        echo "<td>" . "PHP " . $row['price'] . "/KG" . "</td>";
        echo "<td> <span class=\"quantity\">$quantity</span></td>";
        echo "<td> <span class=\"total\">PHP $total</span></td>";
        echo "</tr>";

    }
}
$totalPrice = $subTotal + $deleveryFee;
echo "<tr>
<td class=\"total-price-td\" colspan=\"5\">
    <div class=\"total-price\">
        <div>
            <div class=\"label\">Subtotal:</div>
            <div class=\"box2\">$subTotal</div>
        </div>
        <div>
            <div class=\"label\">Delivery:</div>
            <div class=\"box2\">$deliveryFee</div>
        </div>
        <div>
            <div class=\"label\">Total:</div>
            <div class=\"box2\">$totalPrice</div>
        </div>
    </div>
</td>
</tr>";
