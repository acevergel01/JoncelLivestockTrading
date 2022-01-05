<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['email']))
{
  $email = $_POST['email'];
  $sql =  "select * from patient where email = '" . $email . "'";
  $select=mysqli_query($db->dbConnect(),$sql);
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $emailHashed=md5($row['email']);
      $pass=md5($row['password']);
      $name = ($row['fullname']);
    }
    $link="<a href='192.168.0.23/LoginRegister/reset.php?key=".$emailHashed."&reset=".$pass."'>Click To Reset password</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  
    $mail->Username = "oriontechsystem.dev@gmail.com";
    $mail->Password = "oriontechsystem";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->From='oriontechsystem.dev@gmail.com';
    $mail->FromName='Orion Tech';
    $mail->AddAddress($email, $name);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = ''.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>