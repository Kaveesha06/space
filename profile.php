<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png">
        <title>LA-Profile</title>
    </head>

    <body>

        <!--nav bar-->
        <?php include "navBar.php"; ?>
        <!--nav bar-->

        <div class="adminBody">
            <div class="row container">
                <div class="col-4 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<?php
                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("resource/gamerP.png");
                                    }
                                    ?>" height="150px" id="i" />
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Profile image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                        <button class="btn btn-outline-warning mt-2 col-12" onclick="uploadImg();">Upload</button>
                    </div>
                </div>

                <div class="col-md-8 mt-4">
                    <h2 class="text-center">Profile Details</h2>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="form-label">First Name:</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"] ?>" id="fname" />
                        </div>
                        <div class="col-md-6">
                            <label for="form-label">Last Name:</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"] ?>" id="lname" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo $d["email"] ?>" id="email" />
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["username"] ?>" disabled />
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" value="<?php echo $d["password"] ?>" id="pw" />
                        </div>

                    </div>

                    <div class="d-none" id="msgDiv" onclick="reload();">
                        <div class="alert alert-warning" id="msg"></div>
                    </div>

                    <h4 class="mt-3">Shipping address</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="form-label">No:</label>
                            <input type="text" class="form-control" id="no" />
                        </div>

                        <div class="col-md-9">
                            <label for="form-label">Line 01:</label>
                            <input type="text" class="form-control" id="line1" />
                        </div>

                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="form-label">Line 02:</label>
                        <input type="text" class="form-control" id="line2" />
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn btn-outline-warning col-md-6" onclick="updateData();">Update</button>
                    </div>

                </div>
            </div>

        </div>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer-->


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    </body>

    </html>

<?php

} else {
    // echo ("Please SignIn First !!");
    header("location: signIn.php");
}

?>