<?php
require "DataBase.php";
$db = new DataBase();

if($_GET['key'] && $_GET['reset'])
{
  $emailHashed= $_GET['key'];
  $pass = $_GET['reset'];
  $select = mysqli_query($db->dbConnect(),"select email from patient where md5(email)='$emailHashed' and md5(password)='$pass'");
  
  $row = $select->fetch_assoc();
  $email = $row['email'];
  if(mysqli_num_rows($select) == 1)
  {
    ?>
    <form method="post" action="update_password.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
}
?>