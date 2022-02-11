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
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['email'];
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
    function getProducts($table)
    {
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM `$table`";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        // return json_encode($rows);
        return $result;
    }
}
