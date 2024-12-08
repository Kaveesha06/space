<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
        <title>LA-Reset Password</title>
    </head>

    <body class="fpBody">

        <!--Reset password -->
        <div class="rpBox" id="signIn">

            <h2 class="text-center">Reset Password</h2>

            <div class="d-none">
                <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"])?>"/>
            </div>

            <div class="mt-4 "> 
            <i class="bi bi-shield-lock-fill"></i>
                <label class="text-uppercase text-warning mb-4" for="form-label">password:</label>
                <input type="password" class="form-control" id="np"/>
            </div>

            <div class="mt-4 mb-4 "> 
            <i class="bi bi-shield-lock-fill"></i>
                <label class="text-uppercase text-warning mb-4" for="form-label">Re-enter password:</label>
                <input type="password" class="form-control" id="np2"/>
            </div>

            <div class="d-none alert" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="mt-4">
                <button class="btn btn-secondary col-12" onclick="resetPassword();" >Update</button>
            </div>


        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    
    </body>

</html>