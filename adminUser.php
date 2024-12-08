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

            <body class="adminBody" onload="loadUser();">

                <!-- nav Bar -->
                <?php include "adminNavBar.php";?>
                <!--Nav Bar-->

                <div class="col-10">
                    <h2 class="text-center">User Management</h2>

                    <div class="row d-flex justify-content-end mt-4">
                        <div class="d-none" id="msgDiv" onclick="reload();">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>
                        <div class="col-2">
                            <input type="text" placeholder="User ID" class="form-control" id="uid"/>
                        </div>

                        <button class="btn btn-outline-light col-2" onclick="updateUserStatus();">Change Status</button>
                    </div>

                    <div class="container mt-3">

                        <table class="table table-striped table-dark table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">mobile</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody id="tb">

                                <!--table row-->

                                <!-- table row-->

                            </tbody>
                        </table>

                    </div>

                </div>


                <!--footer-->
                <div class="fixed-bottom col-12">
                    <p class="text-center">&copy; 2024 LunarArcade.lk&REG; || All Right Reserved</p>
                </div>
                <!--footer-->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="script.js"></script>
            </body>

        </html>

        <?php
        
        #Load page
    } else {
    #Login
    echo("You are not a valid admin");
}

?>