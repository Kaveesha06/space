<?php 

session_start();

if (isset($_SESSION["a"])) {
    
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
        <title>Lunar Arcade - Reports</title>

    </head>

    <body class="adminBody">

        <!-- nav bar-->
        <?php include "adminNavBar.php"; ?>
        <!--nav bar-->

        <div class="col-10">
            <h2 class="text-center">Reports</h2>

            <div class="row mt-5">
                <div class="col-4">
                    <a href="adminReportStock.php"><button class="btn btn-outline-info col-12">Stock Report</button></a>
                </div>

                <div class="col-4">
                    <a href="adminReportProduct.php"><button class="btn btn-outline-info col-12">Product Report</button></a>
                </div>

                <div class="col-4">
                    <a href="adminReportUser.php"><button class="btn btn-outline-info col-12">User Report</button></a>
                </div>
               
            </div>
        </div>

        <!--footer-->
        <div  class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 LunarArcade.lk&REG; || All Right Reserved</p>
        </div>
        <!--footer-->

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

</html>

<?php 

} else {
    echo ("You are not a Valid Admin");
}

?>