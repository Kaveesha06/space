<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
        <title>Lunar Arcade</title>
    </head>

    <body class="adminSignInBody">
    
        <div class="adminSignIn_Box">
            <h2 class="text-center text-primary"><b><i> Admin Login </i></b></h2>

            <div class="mt-3">
                <label for="form-label">Username :</label>
                <input type="text" class="form-control border-black" placeholder="EX:Lara" id="un"/>
            </div>

            <div class="mt-3 mb-3">
                <label for="form-label">Password :</label>
                <input type="password" class="form-control border-black" placeholder="******" id="pw"/>
            </div>

            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="mt4">
                <button class="btn btn-primary col-12" onclick="adminSignIn();">Sign In</button>
            </div>

        </div>


        <script src="script.js"></script>
    </body>

</html>