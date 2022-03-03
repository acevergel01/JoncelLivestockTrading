<?php
session_start();
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['payment_mode']) &&  isset($_POST['delivery_mode'])) {
    if ($db->dbConnect()) {
        if ($db->checkout("orders", $_POST['payment_mode'], $_POST['delivery_mode'], $_POST['number'], $_POST['total_price'])) {
            echo "Success";
        }
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
 <?php
    $to = "joncellivestocktrading@gmail.com";
    $subject = "Order";
    $message = '<html><body>';
    $message .= "<p>Name:" . $_SESSION["name"] . "</p>";
    $message .= "<p>Number: " . $_POST['number'] . "</p>";
    $message .= "<p>Delivery Mode: " . $_POST['delivery_mode'] . "</p>";
    $message .= "<p>Payment Mode: " . $_POST['payment_mode'] . "</p>";
    $message .= "<p>Total Price : " . $_POST['total_price'] . "</p><br>";
    require "DataBase.php";
    $uid = $_SESSION['uid'];
    $db = new DataBase();
    $con = $db->dbConnect();
    $sql = "SELECT pid,quantity FROM cart WHERE uid='$uid'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $pid = $row['pid'];
        $quantity = $row['quantity'];
        $sql = "SELECT * FROM products WHERE prod_id='$pid'";
        $result2 = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result2)) {
            $message .=  "<p>".$row['type'].": " ;
            $message .= $quantity."pcs"."</p>";
        }
    }
    $message .= '</body></html>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail($to, $subject, $txt, $headers);
    ?>