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
    </header>

    <!-- End of the header -->
    <!-- Start of the body -->
    <!-- The login Modal -->

    <div id="id01" class="modal-open" style="display: block;">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="frmLogin" class="modal-content " method="post">
                    <div class="modal_header">
                        <span>Login To Your Account</span>
                    </div>
                    <div class="row">
                        <div class=" col-md-7 col-sm-12" style="padding:30px 50px 1px 50px;float:left;">
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
                <form id="frmSignup" class="modal-content" method="post">
                    <div class="modal_header">
                        <span>Register</span>
                        <span class="close">&times</span>
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
                                    <input type="text" placeholder="Last Name, Fist Name Middle Name" style="border-radius: 0;height:inherit" />
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
                                    <input type="text" placeholder="youremail@email.com" style="border-radius: 0;height:inherit" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-field" style="text-align:center">
                            <input class="radio-input" type="radio" id="male" name="gender" value="Male">
                            <label class="radio-label" for="male">Male</label>
                            <input class="radio-input" type="radio" id="female" name="gender" value="Feale">
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
                                    <input type="password" placeholder="********" style="border-radius: 0;height:inherit" />
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
                                    <input type="text" placeholder="" style="border-radius: 0;height:inherit" />
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
                                    <input type="text" placeholder="" style="border-radius: 0;height:inherit" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="text-align: center;margin:20px 0 20px 0">
                            <label class="">
                                <input type="checkbox">
                                <span class=""></span>
                            </label>
                            <span>By checking this you agree to the</span><input type="button" value="Terms & Conditions." onclick="openSignup()" />
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
    <div class="row container-fluid flex-grow-1 body1" style="padding:0;margin:0;">
        <div class="col-4">
        </div>
        <div class="col-8 content">
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
            $("#btnLogin").click(function() {
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
            });
        })
    </script>

    <script src="script.js"></script>
</body>

</html>