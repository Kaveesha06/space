<?php

session_start();

if(isset($_SESSION["a"])) {

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="bootstrap.css"/>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"-->
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
        <title>LUNAR ARCADE - PRODUCT</title>
    </head>

    <body onload="loadProduct();">

        <!-- nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!--nav bar -->

        <div class="row d-flex justify-content-center mt-5">
            <h2 class="text-center mt-5">Product Management</h2>

            <div class="row mt-5">

                <!--Category Register-->
                <div class="col-4 offset-4 mt-4">

                    <label for="form-label">Category</label>
                    <input type="text" class="form-control mb-3" id="cat"/>

                    <div class="d-none" id="msgDiv" onclick="reload();">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="categoryReg();">Category Register</button>
                    </div>
                </div>
                <!--Category Register-->
            </div>

            <div class="row mt-5">
                <!--Franchise Register-->
                <div class="col-4 offset-4 mt-4">
                    <label for="form-label">Franchise Name</label>
                    <input type="text" class="form-control mb-3" id="fran"/>

                    <div class="d-none" id="msgDiv2" onclick="reload();" >
                        <div class="alert alert-danger" id="msg2" ></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="franchiseReg();">Franchise Register</button>
                    </div>
                </div>

            </div>
        </div>


            <!--footer-->
            <div  class="fixed-bottom col-12">
                <p class="text-center">&copy; 2024 LunarArcade.lk&REG; || All Right Reserved</p>
            </div>
            <!--footer-->

        <script src="script.js"></script>
        <script src="https://jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>

</html>

<?php

} else {
    echo("You are not a Valid Admin");
}

?>