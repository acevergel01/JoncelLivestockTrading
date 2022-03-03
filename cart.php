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
                <img src="assets/cart.svg" alt=""></button>
            <!-- TODO remove logout -->
            <button class="user-btn shadow-none" id="user-btn">
                <img src="assets/user.svg" alt="">
            </button>
        </div>
    </header>
    <!-- align-items-start -->
    <div class="row " style="margin: 20px 15px">
        <div class="cart-table col-md-9">
            <?php
            if (isset($_SESSION["id"])) {
            ?>
                <table>
                    <thead>
                        <th class="th-title"> CART</th>
                        <th><span>Type</span></th>
                        <th><span>Details</span></th>
                        <th><span>Quantity</span></th>
                        <th><span>Total Price</span></th>
                        <th></th>
                    </thead>
                    <tbody id="cart-body">

                    </tbody>
                </table>
        </div>
        <div class="cart-checkout col-md-3">

            <form id="checkout">
                <div class="payment-info">PAYMENT INFORMATION</div>
                <div class="large-font">Payment Method</div>
                <div>
                    <input class="radio-input" type="radio" id="cod" name="payment" value="Cash on Delivery" required />
                    <label class="radio-label large-font" for="cod">Cash on Delivery</label>
                </div>
                <div>
                    <input class="radio-input" type="radio" id="ap" name="payment" value="Advance Payment" />
                    <label class="radio-label large-font" for="ap">Advance Payment</label>
                </div>
                <div class="large-font">Delivery Option</div>
                <div>
                    <input class="radio-input" type="radio" id="deliver" name="delivery" value="Deliver" required />
                    <label class="radio-label large-font" for="deliver">Deliver</label>
                </div>
                <div>
                    <input class="radio-input" type="radio" id="pickup" name="delivery" value="Pickup" />
                    <label class="radio-label large-font" for="pickup">Pick Up</label>
                </div>
                <div class="" style="font-size:small;margin-top:20px">CONTACT FOR CONFIRMATION</div>
                <div>

                    <input id="number_cart" type="number" required>
                </div>
                <div>
                    <input type="checkbox" class="large-font" style="font-size:medium;margin-top:20px" id="confirm" required>By CHECKING this, your order/s are confirmed.

                </div>
                <div style="text-align: center;margin-top:20px">
                    <button class="check-out-btn" type="submit">CHECK OUT</button>

                </div>
            </form>
        </div>



    </div>


    <div id="profileMenu" class="sidenav">
        <div class="profile-body">
            <div class="image-name-container">
                <div class="image-container">
                    <img id="userPic" src="assets/image.png" alt="">
                </div>
                <div class="name-container">
                    <span id="name"><?PHP echo $_SESSION['name'] ?></span><br>
                    <span style="text-decoration: underline;font-size: x-small;color: blue;cursor:pointer" onclick="editData()">Edit Profile</span>
                </div>
            </div>
            <div class="row">
                <div class="data-container">
                    <div class="profile-label">
                        Username
                    </div>

                    <div class="profile-input">
                        <?PHP echo "<input type=\"text\" id=\"username\"value=\"" . $_SESSION['username'] . "\">" ?>
                    </div>
                </div>
                <div class="data-container">
                    <div class="profile-label">
                        Address
                    </div>
                    <div class="profile-input">
                        <?PHP echo "<input type=\"text\" id=\"address\" value=\"" . $_SESSION['address'] . "\">" ?>
                    </div>
                    <div class="profile-input">
                    </div>
                </div>
                <div class="data-container">
                    <div class="profile-label">
                        Email Address
                    </div>
                    <div class="profile-input">
                        <?PHP echo "<input type=\"text\" id=\"email\" value=\"" . $_SESSION['email'] . "\">" ?>
                    </div>
                    <div class="profile-input">
                    </div>
                </div>
                <div class="data-container">
                    <div class="profile-label">
                        Contact No.
                    </div>
                    <div class="profile-input">
                        <?PHP echo "<input type=\"text\" id=\"number\" value=\"" . $_SESSION['number'] . "\" \>" ?>
                    </div>
                </div>
            </div>
            <div class="logout">
                <button id="logout">Logout</button>
            </div>
        </div>

    </div>
<?php
            } else { ?>
    <!-- The login Modal -->

    <div id="id01" class="modal-open" style="display: block;padding-top: 50px;">
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
    <div id="id02" class="modal-open signup" style="display: none;padding-top: 50px;">
        <!-- Modal Content -->
        <div class="modal-content-outside animate">
            <div class="modal-content-inside">
                <form id="frmSignup" class="modal-content">
                    <div class="modal_header">
                        <span>Register</span>
                        <span class="close" onclick="openLogin()">&times</span>
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
                            <label class="radio-label" for="female">Female</label>
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
<?PHP
            };
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    selectCart();
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
            jQuery.ajax({
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
            jQuery.ajax({
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
                },
            });

            return false;
        })


        $("input[type=\"text\"]").prop("disabled", true);
        jQuery("#logout").click(function() {
            logout();
        });
        jQuery("#user-btn").click(function() {
            var modal = document.getElementById("profileMenu");
            if ($("#profileMenu").width() == "0") {
                openNav();
            } else closeNav();
            $("body").toggleClass("fixed-position");
        });
        jQuery('#checkout').submit(function(e) {
            e.preventDefault();
            if (!$('#confirm').is(':checked')) {
                return;
            }
            jQuery.ajax({
                url: "checkout.php",
                type: "POST",
                data: {
                    number: $("#number_cart").val(),
                    total_price: $('#totalPrice').text(),
                    payment_mode: $('input[name="payment"]:checked').val(),
                    delivery_mode: $('input[name="delivery"]:checked').val(),
                },
                success: function(data) {
                    alert("Order Placed. Wait for text confirmation. Thank you!")
                },
            });
        });
    });

    function openLogin() {
        closeSignup();
        document.getElementById("id01").style.display = "block";
    }

    function closeLogin() {
        document.getElementById("id01").style.display = "none";
    }

    function openSignup() {
        closeLogin();
        document.getElementById("id02").style.display = "block";
    }

    function closeSignup() {
        document.getElementById("id02").style.display = "none";
    }

    function selectCart() {
        $id = '<?PHP if (isset($_SESSION["uid"])) echo $_SESSION["uid"] ?>';
        var j = jQuery.noConflict();
        j.ajax({
            url: "cart-product.php",
            type: "POST",
            data: {
                uid: $id,
            },
            success: function(result) {
                $("#cart-body").html(result);
                $('[data-toggle="tooltip"]').tooltip();
            },
        });
    }
</script>
<script src="script.js"></script>
</body>

</html>