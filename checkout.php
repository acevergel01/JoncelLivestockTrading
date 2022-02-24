<?php
session_start();
require "DataBase.php";
$db = new DataBase();
if ( isset($_POST['payment_mode']) &&  isset($_POST['delivery_mode'])) {
    if ($db->dbConnect()) {
        if ($db->checkout("orders",$_POST['payment_mode'],$_POST['delivery_mode'],$_POST['number'],$_POST['total_price'])) {
            echo "Success";
        } 
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
 