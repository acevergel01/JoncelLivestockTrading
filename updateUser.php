<?php
require "DataBase.php";
$db = new DataBase();
if ( isset($_POST['email'])) {
    if ($db->dbConnect()) {
        if ($db->updateUser("users",$_POST['email'],$_POST['name'],$_POST['address'],$_POST['number'],$_POST['username'],$_POST['id'])) {
            echo "Success";
        } 
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
