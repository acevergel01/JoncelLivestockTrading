<?php
session_start();
if (isset($_SESSION["id"])) {
    header("Location:dashboard.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Joncel Livestock Trading</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- icon -->
    <link rel="shortcut icon" type="image/jpg" href="assets/logo_circ.png" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- font -->
    <link href="http://fonts.cdnfonts.com/css/goudy-old-style" rel="stylesheet">
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/33baa4b98a.js" crossorigin="anonymous"></script>
    <!-- jquery confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
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
            <button class="nav-btn" id="login-btn">Login</button>
        </div>
    </header>

    <!-- End of the header -->
    <!-- Start of the body -->
    <!-- The login Modal -->

    <div id="id01" class="modal-open" style="display: none;">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="frmLogin" class="modal-content">
                    <div class="modal_header">
                        <span>Login To Your Account</span>
                    </div>
                    <div class="row">
                        <div class=" col-md-7 col-sm-12" style="padding:30px 50px 1px 50px;float:left;">
                            <label for="email"><b>E-mail</b></label>
                            <input type="email" placeholder="E-mail" name="email" id="email" required />

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Password" name="password" id="password" required />
                            <button type="submit" id="btnLogin">
                                <span class="material-icons center">
                                    arrow_forward
                                </span>
                            </button>
                        </div>
                        <div class="col-md-5 col-sm-12 modal-right-side" style="padding-top:30px;float: left;text-align: center">
                            <img src="assets/logo_name.png" alt="asd">
                            <div style=" color: black;margin-bottom:30px"><span>Don't have an account? Click</span><input type="button" value="here" onclick="openSignup()" /> to register.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- sign up modal -->
    <div id="id02" class="modal-open signup" style="display: none;width:100%">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="frmSignup" class="modal-content">
                    <div class="modal_header">
                        <span>Register</span>
                        <span class="close" onclick="closeSignup()">&times</span>
                    </div>
                    <div class="row" style="padding:30px">
                        <div class="col-md-6 text-field">
                            <div class="a-text">
                                <div class="a-label">
                                    <div>
                                        FULL NAME
                                    </div>
                                </div>
                                <div class="a-input">
                                    <input type="text" placeholder="Last Name, Fist Name Middle Name" style="border-radius: 0;height:inherit" name="fname" id="fname" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-field">
                            <div class="a-text">
                                <div class="a-label">
                                    <div>
                                        EMAIL
                                    </div>
                                </div>
                                <div class="a-input">
                                    <input type="email" placeholder="youremail@email.com" style="border-radius: 0;height:inherit" name="regEmail" id="regEmail" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-field" style="text-align:center">
                            <input class="radio-input" type="radio" id="male" name="gender" value="Male" required>
                            <label class="radio-label" for="male">Male</label>
                            <input class="radio-input" type="radio" id="female" name="gender" value="Female">
                            <label class="radio-label" for="male">Female</label>
                        </div>
                        <div class="col-md-6 text-field">
                            <div class="a-text">
                                <div class="a-label">
                                    <div>
                                        PASSWORD
                                    </div>
                                </div>
                                <div class="a-input">
                                    <input type="password" placeholder="********" style="border-radius: 0;height:inherit" name="regPassword" id="regPassword" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-field">
                            <div class="a-text">
                                <div class="a-label">
                                    <div>
                                        COMPLETE ADDRESS
                                    </div>
                                </div>
                                <div class="a-input">
                                    <input type="text" placeholder="" style="border-radius: 0;height:inherit" name="address" id="address" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-field">
                            <div class="a-text">
                                <div class="a-label">
                                    <div>
                                        CONTACT NUMBER
                                    </div>
                                </div>
                                <div class="a-input">
                                    <input type="text" placeholder="" style="border-radius: 0;height:inherit" name="number" id="number" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="text-align: center;margin:20px 0 20px 0">
                            <label class="">
                                <input type="checkbox" id="terms" required>
                                <span class=""></span>
                            </label>
                            <span>By checking this you agree to the</span><input type="button" value="Terms & Conditions." />
                            <!-- todo insert terms -->
                        </div>
                        <div class="col-12" style="text-align: center;">
                            <button type="submit" id="btnSignup">
                                <span class="material-icons center">
                                    arrow_forward
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The bodyyy -->
    <div class="flex-grow-1" style="min-height:570px;padding:40px 0 0 0;">

        <div class="index row">
            <div class="col-3"></div>
            <div class="col-3 row">
                <div class="col-6">
                    <div class="box" style="float:right"><img src="assets/pig.png" alt=""></div>
                </div>
                <div class="col-6">
                    <div class="box"><img src="assets/chicken.png" alt=""></div>
                </div>
                <div class="col-6">
                    <div class="box" style="float:right"><img src="assets/goat.png" alt=""></div>
                </div>
                <div class="col-6">
                    <div class="box"><img src="assets/cow.png" alt=""></div>
                </div>
            </div>
            <div class="col-6" style="max-height: 300px;">
                <div style="text-transform: uppercase">
                    <span style="font-size: 100px;line-height:90px">
                        Providing
                    </span>
                    <br>
                    <span style="font-size: 50px;line-height:50px">
                        the only best</span>
                    <br>
                    <span style="font-size: 40px;line-height:40px">
                        livestock</span>
                    <br>
                    <span style="font-size: 30px;line-height:30px">
                        since 2019</span>
                </div>

                <div class="company-info">Joncel Livestock Trading is a registered business about buying and selling live
                    animals such as pigs, cows, carabaus, horses, and goats. But since pork is in
                    demand in the market especially during holiday season, our focus is more on
                    trading swine/hogs (pigs). A quite large amount of money is needed in this
                    business but I can say it is a good source of income and a great help to sustain
                    our family's needs and expenses.</div>
            </div>

        </div>

    </div>
    </div>
    <!-- footer -->
    <footer style="padding: 0;margin: 0;">
        <div style="float:right;height:100%;padding:15px;margin-right:50px">

            <span style="color:white;padding:0 10px;">CONTACT</span>

            <button><i class="fab fa-instagram"></i>
            </button>

            <button><i class="fab fa-twitter"></i>
            </button>

            <button><i class="fab fa-facebook"></i>

            </button>
        </div>
    </footer>


    <script>
        $(document).ready(function() {
            $(`#login-btn`).click(function() {

                var modal = document.getElementById("id01");

                if (window.getComputedStyle(modal).display === "none") {
                    openLogin();
                } else closeLogin();

            });
            // login 
            $('#frmLogin').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {
                        email: $("#email").val(),
                        password: $("#password").val()
                    },
                    success: function(result) {
                        window.location.replace("dashboard.php");
                    },
                });
                // signup
                return false;
            });
            $('#frmSignup').submit(function(e) {
                e.preventDefault();
                if (!$('#terms').is(':checked')) {

                    return;
                }
                $.ajax({
                    url: "signup.php",
                    type: "POST",
                    data: {
                        name: $("#fname").val(),
                        password: $("#regPassword").val(),
                        address: $("#address").val(),
                        number: $("#number").val(),
                        email: $("#regEmail").val(),
                        gender: $('input[name="gender"]:checked').val()
                    },
                    success: function(data) {
                        if (data == 'Sign Up Success') {
                            openLogin()
                            return;
                        }
                        const dataObj = JSON.parse(data)
                        if (dataObj.error) {
                            $.alert({
                                title: 'Duplicate Email',
                                content: 'Email already registered',
                                type: 'red',
                            });
                        }
                    },
                });

                return false;
            })
        })
    </script>

    <script src="script.js"></script>
</body>

</html>