<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

 if (isset($user)) {
    //load user

    ?>
    
        <!DOCTYPE html>
        <html lang="en" data-bs-theme="dark">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="bootstrap.css"/>
                <link rel="stylesheet" href="style.css" />
                <link rel="icon" href="resource/lunar_arcade_logo_edit.png">
                <title>LA-Cart</title>

            </head>

            <body onload="loadCart();">

                <!--nav bar-->
                <?php include "navBar.php"; ?>
                <!--nav bar-->

                <div class="container d-flex justify-content-center mt-5">
                    <div class="row" id="cartBody">
                        <!--Cart load here-->

                        
                        


                    </div>
                </div>

                <!--footer-->
                <?php include "footer.php"; ?>
                <!--footer-->


                <script src="script.js"></script>
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                <script src="https://jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


            </body>
        </html>
    
    <?php


 }else {
    header("location: cart.php");
 }

?>