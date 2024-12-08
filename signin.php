<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <title>Lunar Arcade</title>

</head>

<body class="signIn_Body">

    <div class="side-img"></div>
    <div class=" d-flex justify-content-center">
        <div class="row align-content-center">
            <div class="logo mb-3"></div>
            <div class="col-12">
                <p class="text-center title01 text-dark" style="font-family:honey;font-size:25px;letter-spacing:2px;">PARADISE of the GALACTIC Gamers..!!</p>
            </div>
        

            <!-- Sign In Box--> 
            <div class="signIn_Box" id="signInBox">

                <h2 class="text-center">Sign In</h2>

                <?php

                $username = "";
                $password = "";

                if (isset($_COOKIE["username"])) {
                    $username = $_COOKIE["username"];
                }

                if (isset($_COOKIE["password"])) {
                    $password = $_COOKIE["password"];
                }

                ?>

                <div class="mt-3 "> 
                    <i class="bi bi-person"></i>
                    <label for="form-label">Username:</label>
                    <input type="text" class="form-control" id="un" placeholder="Please enter your User Name " value="<?php echo $username ?>"/>
                </div>

                <div class="mt-2">
                    <i class="bi bi-shield-lock"></i>
                    <label for="form-label">Password:</label>
                    <input type="password" class="form-control" id="pw" placeholder="Enter your password to Sign in" value="<?php echo $password ?>"/>
                </div>

                <div class="mt-2 mb-2">
                    <input type="checkbox" class="form-check-input" id="rm" />
                    <label for="form-label">Remember me</label>
                </div>

                <div class="d-none alert" id="msgDiv2" onclick="reload();" >
                    <div class="alert alert-danger" id="msg2"></div>
                </div>

                <div class="mt-2">
                    <button class="btn btn-info col-12" onclick="signIn();">Sign In</button>
                </div>

                <div class="mt-2">
                    <a href="forgetPassword.php"><button class="btn btn-secondary btn-sm col-12">forgot password?</button></a>
                </div>

                <div class="mt-2">
                <h6>New to LUNAR ARCADE, <a href="#" class="alert-link" onclick="changeView();">Click here to join</a> with us..!!</h6>
                </div>
            </div>
            <!--sign in box--->


            <!-- Sign Up Box -->

            <div class="signUp_Box d-none" id="signUpBox">

                <h1 class="text-center">Sign Up</h1>
                <div class="row">

                    <div class="mt-3 col-6">
                        <i class="bi bi-person-add"></i>
                        <label for="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Lincon" />
                    </div>

                    <div class="mt-3 col-6">
                        <i class="bi bi-person-add"></i>
                        <label for="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="browse" />
                    </div>

                </div>

                    <div class="mt-3">
                        <i class="bi bi-envelope-at"></i>
                        <label for="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="linc@gmail.com" />
                    </div>

                    <div class="mt-3">
                        <i class="bi bi-phone"></i>
                        <label for="form-label">Mobile:</label>
                        <input type="text" class="form-control" id="mobile" placeholder="07########" />
                    </div>

                    <div class="row">
                        <div class="mt-3 col-6">
                            <i class="bi bi-fingerprint"></i>
                            <label for="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Linc09" />
                        </div>

                    <div class="mt-3 mb-3 col-6">
                        <i class="bi bi-person-lock"></i>
                        <label for="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="******" />
                    </div>
            </div>

            <div class="d-none" id="msgDiv1" onclick="reload();" >
                <div class="alert alert-danger" id="msg1"></div>
            </div>

            <div class="mt-2">
                <button class="btn btn-danger col-12" onclick="signUp();">Sign Up</button>
            </div>
            <div class="mt-2">
                <button class="btn btn-warning col-12" onclick="changeView();">Already have an account? Please Sign In</button>
            </div>

        </div>
            <!--sign up box--->
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>