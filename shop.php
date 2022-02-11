<?php
session_start();
require "DataBase.php";
$db = new DataBase();
$con = $db->dbConnect();
$result = mysqli_query($con, "SELECT DISTINCT name FROM products");
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
    <!-- font -->
    <link href="http://fonts.cdnfonts.com/css/goudy-old-style" rel="stylesheet">
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/33baa4b98a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />

</head>

<body class="shop" style="right: 0;">
    <header>
        <!-- Header -->
        <div class="logo">
            <a href="/"> <img src="assets/logo_circ.png" alt="Jocel Livestock Trading" /></a>
        </div>
        <div class="company-name">
            <span>JONCEL LIVESTOCK TRADING</span>
        </div>

        <div class="nav-container">
            <div class="select-container">
                <div style="text-align: left;">Products</div>
                <select name="products" id="products" onchange="selectProduct()">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value=\"\">" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="vl"></div>
            <button class="cart-btn">
                <img src="assets/cart.svg" alt="" onclick="window.location.href='logout.php'"></button>
            <!-- TODO remove logout -->
            <button class="user-btn shadow-none">
                <img src="assets/user.svg" alt="">
            </button>
        </div>
    </header>
    <div class="product-table">

        <?php
        if (isset($_SESSION["id"])) {
        ?>
            <table>
                <thead>
                    <th></th>
                    <th><span>Type</span></th>
                    <th><span>Price</span></th>
                    <th><span>Quantity</span></th>
                    <th><span>Total Price</span></th>
                    <th></th>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
    </div>
    <div class="products-body">

    </div>
    </div>
<?php
        } else header('Location:/');
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        selectProduct();
    });
</script>
</body>

</html>