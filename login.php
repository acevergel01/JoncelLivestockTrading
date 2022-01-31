<?php
session_start();
$message = "";
if (count($_POST) > 0) {
    require "DataBase.php";
    $db = new DataBase();
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($db->dbConnect()) {
            if ($db->logIn("users", $_POST['email'], $_POST['password'])) {
                header("Location:dashboard.php");
                echo "Success";
            }
        } else $message =  "Error: Database connection";
    } else $message =  "All fields are required";
}

?>