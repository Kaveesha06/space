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
                <title>Lunar Arcade - Admin Dashboard</title>
            </head>

            <body class="adminBody" onload="loadChart();">

                <!-- nav Bar -->
                <?php include "adminNavBar.php";?>
                <!--Nav Bar-->

               <!--chart-->
                <div style="width: 600px">
                    <h2 class="text-center">Most Sold Products</h2>
                    <canvas id="myChart"></canvas>
                </div>

               <!--chart-->


                <!--footer-->

                <!-- include -->
                <div class="fixed-bottom col-12">
                    <p class="text-center">&copy; 2024 LunarArcade.lk&REG; || All Right Reserved</p>
                </div>
                <!--footer-->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="script.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            </body>

        </html>

        <?php
        
        #Load page
    } else {
    #Login
    echo("You are not a valid admin");
}

?>