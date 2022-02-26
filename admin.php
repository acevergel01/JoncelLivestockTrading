<?php
session_start();
if (isset($_SESSION['id'])) {
    if (!(isset($_SESSION['id']) && $_SESSION['admin'])) {
        header('Location:/');
    }
} else
    header('Location:/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Joncel Livestock Trading</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- icon -->
    <link rel="shortcut icon" type="image/jpg" href="assets/logo_circ.png" />
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/33baa4b98a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <style>
        tr {
            padding: 10px
        }
    </style>
</head>

<body class="dashboard" style="padding:50px">
    <table style="background-color: white;">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Name</th>
                <th>Number</th>
                <th>Orders</th>
                <th>Qquantity</th>
                <th>Payment Method</th>
                <th>Delivery Method</th>
                <th>Total Price</th>

            </tr>
        </thead>
        <tbody>
            <?PHP
            require "DataBase.php";
            $uid = $_SESSION['uid'];
            $db = new DataBase();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($con, $sql);
            $orderList = array();
            while ($row = mysqli_fetch_array($result)) {
                $orders = json_decode($row['orders']);
                $quantity = json_decode($row['quantity']);
                foreach ($orders as $order) {
                    $sql2 = "SELECT type FROM products where prod_id='$order'";
                    $result2 = mysqli_query($con, $sql2);
                    array_push($orderList, mysqli_fetch_array($result2)['type']);
                }
                echo "<tr>";
                echo "<td>" . $row['oid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";

                echo "<td>";
                foreach ($orderList as $index => $value) {
                    echo $orderList[$index] . "<br>";
                }
                echo "</td>";

                echo "<td>";
                foreach ($quantity  as $index => $value) {
                    echo $quantity[$index] . "<br>";
                }
                echo "</td>";

                echo "<td>" . $row['payment_mode'] . "</td>";

                echo "<td>" . $row['delivery_mode'] . "</td>";
                echo "<td>" . $row['total_price'] . "</td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
</body>

</html>