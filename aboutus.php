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
    <link rel="shortcut icon" type="image/jpg" href="assets/logo_circ.png" />
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/33baa4b98a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body class="dashboard">
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
                <div class="col-lg-6" style="padding-top: 20px;">
                    <div class="mapouter" style="margin: 0 auto;">
                        <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=14.117659,%20121.553903&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 600px;
                                }
                            </style><a href="https://www.embedgooglemap.net">map embed</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 600px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="padding:30px 100px;text-align: left;">
                <span>
                    Joncel Livestock Trading has a long history of serving consumers and the community as a family-owned business. Even though things have changed over time, the personal and pleasant service our customers have grown to expect will never change.
                    Produced locally in the Philippines, growing only the healthiest livestock and the safest poultry Joncel Livestock Trading is the go-to online platform for private treaty sales of livestock, and poultry. Owned and founded by Johnny V. Panganiban Joncel Livestock has never been any better.
                </span>
                <br><br><br>
                <span>
                    Stop by and meet our staff or give us a call at +639687127250. See our map if you need directions</span>
            </div>
        </div>
        </div>
        <footer style="padding: 0;margin: 0;">
            <div class="back-btn" onclick="window.location.href='dashboard.php'">
                <button>
                    <span class="material-icons" style="width:25px">
                        arrow_backward
                    </span>
                </button>
            </div>
            <div class="socials">
                <button onclick="window.location.href='dti.php'">
                    <img src="assets/dti_logo.jpg" alt="">
                </button>
                <span style="color:white;padding:0 10px;">CONTACT</span>

                <button><i class="fab fa-instagram"></i>
                </button>

                <button><i class="fab fa-twitter"></i>
                </button>

                <button><i class="fab fa-facebook"></i>

                </button>
            </div>
        </footer>
</body>

</html>