<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['submit_password']) && isset($_POST['email']) && isset($_POST['password'])) {
  if ($db->dbConnect()) {
      if ($db->resetPassword("patient", $_POST['email'], $_POST['password'])) {
          echo "Reset password success";
      } else echo "Reset password Failed";
  } else echo "Error: Database connection";
} else echo "All fields are required";
?>