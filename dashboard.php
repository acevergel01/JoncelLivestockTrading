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
    <!-- jquery -->
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
                    <img src="assets/cart.svg" alt=""></button>
                <button class="user-btn shadow-none" id="user-btn">
                    <img src="assets/user.svg" alt="">
                </button>
            </div>
        </header>
        <div class="dashboard-body" style="text-align: center;">
            <div style="margin-top: 210px;">
                <span class="span2" style="background-color:rgba(256, 256, 256, .3);padding:20px 0px;border:1px solid #70707059">
                    LET JLT MEAT YOUR NEEDS.
                </span>
            </div>
            <div style="margin:110px 0;">
                <button onclick="window.location.href='shop.php'">SHOP NOW</button>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="profile-body">
                <div class="image-name-container">
                    <div class="image-container">
                        <img id="userPic" src="assets/image.png" alt="">
                    </div>
                    <div class="name-container">
                        <span id="name">Name</span><br>
                        <span style="text-decoration: underline;font-size: x-small;color: blue;cursor:pointer" onclick="editData()">Edit Profile</span>
                    </div>
                </div>
                <div class="row">
                    <div class="data-container">
                        <div class="profile-label">
                            Username
                        </div>
                        <div class="profile-input">
                            <input type="text">
                        </div>
                    </div>
                    <div class="data-container">
                        <div class="profile-label">
                            Address
                        </div>
                        <div class="profile-input">
                            <input type="text">
                        </div>
                        <div class="profile-input">
                        </div>
                    </div>
                    <div class="data-container">
                        <div class="profile-label">
                            Email Address
                        </div>
                        <div class="profile-input">
                            <input type="text">
                        </div>
                        <div class="profile-input">
                        </div>
                    </div>
                    <div class="data-container">
                        <div class="profile-label">
                            Contact No.
                        </div>
                        <div class="profile-input">
                            <input type="text">
                        </div>
                        <div class="profile-input">
                        </div>
                    </div>
                </div>
                <div class="logout">
                    <button id="logout">Logout</button>
                </div>
            </div>

        </div>
    <?php
    } else
        header('Location:/');
    ?>
    <script src="script.js"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input").prop("disabled", true);
            jQuery("#logout").click(function() {
                logout();
            });
            jQuery(`#user-btn`).click(function() {

                var modal = document.getElementById("mySidenav");
                if ($("#mySidenav").width() == "0") {
                    openNav();
                } else closeNav();

            });
        });

        function editData() {
            $("input").prop("disabled", false);
            $("#logout").html("Save");
            $('#logout').off('click');
            $('#logout').click(function() {
                saveData();
            });
        };

        function logout() {
            window.location.href = 'logout.php'
        }

        function saveData() {
            $("input").prop("disabled", true);
            $("#logout").html("Logout");
            $('#logout').off('click');
            $('#logout').click(function() {
                logout();
            });
        }
    </script>
</body>

</html>