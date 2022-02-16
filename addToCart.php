<?php
require "DataBase.php";
$db = new DataBase();
if ( isset($_POST['pid']) &&  isset($_POST['quantity'])) {
    if ($db->dbConnect()) {
        if ($db->addToCart("cart",$_POST['pid'],$_POST['quantity'],$_POST['uid'])) {
            echo "Success";
        } 
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
