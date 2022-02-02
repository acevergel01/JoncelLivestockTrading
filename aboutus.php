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
                <button class="nav-btn" onclick="window.location.href='dashboard.php'">Home</button>
                <div class="vl"></div>
                <button class="cart-btn">
                    <img src="assets/cart.svg" alt=""></button>
                <button class="user-btn shadow-none" onclick="window.location.href='logout.php'">
                    <img src="assets/user.svg" alt="">
                </button>
            </div>
        </header>
        <div class="aboutus-body" style="text-align: center;">
            <div class="row" style="margin:0">
                <div class="col-lg-6">
                    <img src="assets/logo_name.png" alt="">
                </div>
                <div class="col-lg-6" style="padding-top: 20px;" >
                <div class="mapouter" style="margin:0 auto"><div class="gmap_canvas"><iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org"></a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:500px;}</style><a href="https://www.embedgooglemap.net">google map on web site</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:500px;}</style></div></div>
                </div>
                <div class="" style="padding:30px 100px;text-align: left;">
                    <span >
                        Joncel Livestock Trading has a long history of serving consumers and the community as a family-owned business. Even though things have changed over time, the personal and pleasant service our customers have grown to expect will never change.
                        Produced locally in the Philippines, growing only the healthiest livestock and the safest poultry Joncel Livestock Trading is the go-to online platform for private treaty sales of livestock, and poultry. Owned and founded by Johnny V. Panganiban Joncel Livestock has never been any better.
                    </span>
                    <br><br><br>
                    <span>
                        Stop by and meet our staff or give us a call at +639687127250. See our map if you need directions</span>
                </div>
            </div>
        </div>
    <?php
    } else
        header('Location:/');
    ?>
</body>

</html>