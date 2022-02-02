<?php
session_start();
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
    <link rel="shortcut icon" type="image/jpg" href="assets/logo.png" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body class="dashboard">
    <?php
    if (isset($_SESSION["id"])) {
    ?>
        <header>
            <!-- Header -->
            <div class="logo">
                <a href="/"> <img src="assets/logo_circ.png" alt="Jocel Livestock Trading" /></a>
            </div>
            <div class="company-name">
                <span>JONCEL LIVESTOCK TRADING</span>
            </div>
            <div class="nav-container">
                <button class="nav-btn" onclick="window.location.href='aboutus.php'">About Us</button>
                <div class="vl"></div>
                <button class="cart-btn">
                    <img src="assets/cart.svg" alt="" onclick="window.location.href='logout.php'"></button>
                    <!-- TODO remove logout -->
                <button class="user-btn shadow-none">
                    <img src="assets/user.svg" alt="">
                </button>
            </div>
        </header>
        <div class="dashboard-body" style="text-align: center;">
            <div style="margin-top: 70px;">
                <span class="span1">
                    PROVIDING THE ONLY BEST LIVESTOCK SINCE 2019
                </span>
            </div>
            <div style="margin-top: 120px;">
                <span class="span2">
                    LET JLT MEAT YOUR NEEDS.
                </span>
            </div>
            <div style="margin:110px 0;">
                <button>SHOP NOW</button>
            </div>
        </div>
    <?php
    } else
        header('Location:/');
    ?>
</body>

</html>