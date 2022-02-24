<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->dbConnect(), stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where email = '" . $email . "'";
        $result = mysqli_query($this->dbConnect(), $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['email'];
            $dbpassword = $row['password'];
            if ($dbusername == $email && password_verify($password, $dbpassword)) {
                $login = true;
                $_SESSION["id"] = session_id();
                $_SESSION["uid"] = $row['id'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["address"] = $row['address'];
                $_SESSION["number"] = $row['number'];
                $_SESSION["username"] = $row['username'];
            } else {
                $login = false;
                echo "Invalid password";
            }
        } else {
            $login = false;
            echo "User does not exist";
        }

        return $login;
    }

    function signUp($table, $email, $password, $name, $address, $number, $gender)
    {
        $con = $this->dbConnect();
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO " . $table . " (password, email,name,address,number,gender) VALUES ('"  . $password . "','" . $email . "','" . $name . "','" . $address . "','" . $number . "','" . $gender  . "')";
        if (!mysqli_query($con, $this->sql)) {
            $errorMsg = mysqli_error($con);
            if (str_contains($errorMsg, 'users_email_unique')) {
                $error = 1;
                $message = "Email already registered";
            }
            echo json_encode(array('error' => $error, 'message' => $message));
        } else return true;
    }
    function updateUser($table, $email, $address, $number, $username, $id)
    {
        $con = $this->dbConnect();
        $email = $this->prepareData($email);
        $address = $this->prepareData($address);
        $number = $this->prepareData($number);
        $username = $this->prepareData($username);
        $this->sql =
            "UPDATE " . $table . " SET email=\"" . $email . "\", address=\"" . $address . "\", number=\"" . $number . "\", username=\"" . $username  . "\" WHERE id=" . $id . "";
        if (!mysqli_query($con, $this->sql)) {
            $errorMsg = mysqli_error($con);
            if (str_contains($errorMsg, 'users_email_unique')) {
                $error = 1;
                $message = "Email already registered";
            }
            echo json_encode(array('error' => $error, 'message' => $message));
        } else {
            $_SESSION["email"] = $email;
            $_SESSION["address"] = $address;
            $_SESSION["number"] = $number;
            $_SESSION["username"] = $username;
            return true;
        }
    }
    function addToCart($table, $pid, $quantity, $uid)
    {
        $pid = $this->prepareData($pid);
        $quantity = $this->prepareData($quantity);
        $uid = $this->prepareData($uid);
        $con = $this->dbConnect();
        $this->sql = "SELECT cid FROM `$table` WHERE uid=$uid and pid=$pid";
        $result = mysqli_query($con, $this->sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cid = $row["cid"];
            }
            $this->sql = "UPDATE $table SET quantity = $quantity + quantity WHERE cid = $cid";
            $result = mysqli_query($con, $this->sql);
        } else {
            $this->sql = "INSERT INTO $table (uid,pid,quantity) VALUES ($uid,$pid,$quantity)";
            echo $this->sql;
            $result = mysqli_query($con, $this->sql);
        }
    }
    function checkout($table,$payment_method,$delivery_method,$number,$total_price)
    {
        $payment_method = $this->prepareData($payment_method);
        $delivery_method = $this->prepareData($delivery_method);
        $total_price = $this->prepareData($total_price);
        $number = $this->prepareData($number);
        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];
        $table = "orders";
        $con = $this->dbConnect();
        $sql = "SELECT pid,quantity FROM `cart`  WHERE uid='$uid'";
        $result = mysqli_query($con, $sql);
        $orders = array();
        $quantities = array();
        while ($row = mysqli_fetch_array($result)) {
            $orders[] = $row['pid'];
            $quantities[] = $row['quantity'];
        }
        $orders =  json_encode($orders);
        $quantities = json_encode($quantities);
        $sql2 =
        "INSERT INTO " . $table . " (name,number, orders,quantity,total_price,payment_mode,delivery_mode) VALUES ('" .
         $name . "','" . $number . "','" . $orders . "','" . $quantities . "','" . $total_price . "','" . $payment_method . "','" . $delivery_method  . "')";
         $result2 = mysqli_query($con, $sql2);
         echo $sql2;
        }
}
