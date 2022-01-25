<?php
session_start();
if (isset($_SESSION["id"])) {
    header("Location:home.php");
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

    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
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
    </header>

    <!-- End of the header -->
    <!-- Start of the body -->
    <!-- The login Modal -->

    <div id="id01" class="modal" style="display: block;">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="frmLogin" class="modal-content " method="post">
                    <div class="login_header">
                        <span>Login To Your Account</span>
                    </div>
                    <div class="row">
                        <div class=" col-lg-7 col-sm-12" style="padding:80px;float:left">
                            <label for="email"><b>E-mail</b></label>
                            <input type="text" placeholder="E-mail" name="email" id="email" required />

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Password" name="password" id="password" required />
                            <button type="submit" id="btnLogin">
                                <span class="material-icons center">
                                    arrow_forward
                                </span>
                            </button>

                        </div>
                        <div class="col-lg-5 col-sm-12" style="padding-top:80px;float: left;text-align: center">
                            <img src="assets/logo_name.png" alt="asd" style="width: 70%;margin:0 auto 50px 0px">
                            <div style="color: black;"><span>Don't have an account? Click</span><input type="button" value="here" onclick="openSignup()" /> to register.</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- sign up modal -->
    <div id="id02" class="modal">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="signup" class="modal-content " method="post">
                    <div class="login_header">
                        <span>Register</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The bodyyy -->
    <div class="row container-fluid flex-grow-1" style="padding:0;margin:0;height:541px">
        <div class="col-3">
        </div>
        <div class="col-9 content">
        </div>
    </div>
    <!-- footer -->
    <footer style="padding: 0;margin: 0;display: table">
        <div style="display: table-cell;vertical-align: middle;padding-left:70%">

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
            $("#btnLogin").click(function() {
                console.log("Hello")
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {
                        email: $("#email").val(),
                        password: $("#password").val()
                    },
                    success: function(result) {
                        console.log(result);
                        window.location.replace("home.php");
                    },
                });
            });
        })
    </script>
</body>

</html>