<?php
require "DataBase.php";
$db = new DataBase();
if ( isset($_POST['email']) &&  isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users",$_POST['email'],$_POST['password'],$_POST['name'],$_POST['address'],$_POST['number'],$_POST['gender'])) {
            echo "Sign Up Success";
        } 
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
