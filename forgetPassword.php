<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
        <title>LA-Forget Password</title>
    </head>

    <body class="fpBody">

        <!--forget password box-->
        <div class="fp_Box" id="signInBox">

            <h2 class="text-center text-success">Forget Password</h2>

            <div class="mt-4 ">
                <i class="bi bi-envelope-at-fill"></i>
                <label for="form-label">Email:</label>
                <input type="email" class="form-control" id="e" placeholder="enter your email.."/>
            </div>

            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary col-12" onclick="forgetPassword();">Send email</button>
            </div>


        </div>
        <!--forget password box-->
    
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

</html>