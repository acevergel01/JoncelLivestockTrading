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



    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header class="flex-container">
        <!-- Header -->
        <div class="container-fluid">
            <div class="row">
                <div style="background-color: #000;height:50%;"></div>
                <div class="logo col-7">
                    <a href="index.php"> <img src="assets/logo.png" alt="Jocel Livestock Trading" /></a>
                </div>
                <div class="col-5 row" style="padding:0;margin:0">
                    <div class="col-2"></div>
                    <div class="col-7" style="display: table;">
                        <div style="display: table-cell; vertical-align: middle;">
                            <label for="category">Products</label>
                            <select name="category" id="category">
                                <option value="" disabled selected>Select </option>
                                <option value="pork">Pork</option>
                                <option value="beef">Beef</option>
                                <option value="chicken">Chicken</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-3" style="position: relative;">
                        <button type="button" class="button" onclick="document.getElementById('id01').style.display='block'">
                            LOGIN
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End of the header -->
    <!-- Start of the body -->
    <!-- The Modal -->

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form id="frmLogin" class="modal-content animate" method="post" action="#" target="frame">
            <div class="imgcontainer">
                <img src="assets/logo.png" alt="Avatar" class="avatar" />
            </div>

            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" id="email" required />

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" id="password" required />
                <input class="button" type="button" id="btnLogin" value="Login" />
                <label>
                    <input type="checkbox" checked="checked" name="remember" />
                    Remember me
                </label>
            </div>

            <div class="container" style="background-color: #f1f1f1">
                <button class="button" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                    Cancel
                </button>
                <span class="psw"> <a href="#">Forgot password?</a></span>
            </div>
        </form>
    </div>

    <!-- The bodyyy -->
    <div class="row container-fluid flex-grow-1" style="padding:0;margin:0">
        <div class="col-3 side">
        </div>
        <div class="col-9 content">
        </div>
    </div>
    <!-- footer -->
    <footer class="row" style="padding: 0;margin: 0;">
        <div class="col-9">hello</div>
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
                        console.log(result);
                        window.location.replace("home.php");
                    },
                });
            });
        })
    </script>
    <script src="script.js"></script>
</body>

</html>