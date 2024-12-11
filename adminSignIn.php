<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
     <link rel="stylesheet" href="style.css" /> 
    <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
    <title>Lunar Arcade</title>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="stylea.css" />
</head>

<body>

            <div class="container">

                <form>
                    <label for="username">Username:</label>
                    <input type="text" id="username" placeholder="Username here..." /><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Password here..." /><br>

                    <div  class="d-none" id="msgDiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <button onclick="adminSignIn();">Sign In</button>
                </form>

                <div class="ear-l"></div>
                <div class="ear-r"></div>
                <div class="panda-face">
                    <div class="blush-l"></div>
                    <div class="blush-r"></div>
                    <div class="eye-l">
                        <div class="eyeball-l"></div>
                    </div>
                    <div class="eye-r">
                        <div class="eyeball-r"></div>
                    </div>
                    <div class="nose"></div>
                    <div class="mouth"></div>
                </div>
                <div class="hand-l"></div>
                <div class="hand-r"></div>
                <div class="paw-l"></div>
                <div class="paw-r"></div>
            </div>
    
        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>