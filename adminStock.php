<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

?>



    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock-Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />

    </head>

    <body class="adminBody" id="stockMan">

        <!--nav bar-->
        <?php include "adminNavBar.php"; ?>
        <!--nav bar-->

        <div class="container-fluid" style="margin-top: 80px;">

            <div class="row">

                <div class="col-5 offset-1">

                    <h2  class="textcenter">Product Registration</h2>

                    <div class="d-none alert" id="msgDiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label" for="pname">Product Name</label>
                        <input id="pname" type="text" class="form-control" required/>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="category">Category</label>
                            <select id="cat" class="form-select">
                                <option value="0">Select</option>
                                <?php
                                
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for($x =0; $x<$num; $x++){
                                    $data = $rs->fetch_assoc();
                                    ?>
                                    
                                    <option value="<?php echo($data["cat_id"]); ?>"> <?php echo($data["cat_name"]);?> </option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="fran">Franchise</label>
                            <select id="fran" class="form-select">
                                <option value="0">Select</option>
                                <?php
                                
                                    $rs = Database::search("SELECT * FROM `franchise`");
                                    $num = $rs->num_rows;

                                    for($x =0; $x<$num; $x++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                    
                                        <option value="<?php echo($data["fran_id"]); ?>"> <?php echo($data["fran_name"]);?> </option>
                                        <?php
                                    }

                                ?>

                            </select>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="desc">Desciption</label>
                        <textarea id="desc" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="file">Product Image</label>
                        <input id="file" class="form-control" type="file"/>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary col-12" onclick="regProduct();">Register Product</button>
                    </div>

                </div>
                <!-- product management-->

                <!-- stock Management-->
                <div class="row col-5">

                    <h2 class="text-center">Stock Update</h2>

                    <div class="d-none alert" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mb-5" >
                        <label class="form-label" for="sproduct">Product Name</label>
                        <select class="form-select" id="sproduct">
                                    <option>Select</option>
                                    <?php
                                    $rs = Database::search("SELECT * FROM `product`");
                                    $num = $rs->num_rows;

                                    for ($i=0; $i<$num; $i++){
                                        $d = $rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $d["id"]?>"><?php echo $d["name"]?></option>
                                        <?php
                                    }
                                    
                                    ?>
                            
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="form-label" for="qty">QTY</label>
                        <input type="text" class="form-control" id="qty" required/>
                    </div>

                    <div class="mb-5">
                        <label class="form-label" for="uprice">Unit Price</label>
                        <input type="text" class="form-control" id="uprice" required/>
                    </div>

                    <div class="d-grid mt-10 mb-10 ">
                        <button class="btn btn-secondary" onclick="updateStock();">Update Stock</button>
                    </div>

                </div>

            </div>
        </div>

        <!--footer-->
            <div class="fixed-bottom col-12">
                <p class="text-center">&copy; 2024 LunarArcade.lk&REG; || All Right Reserved</p>
            </div>
        <!--footer-->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>

<?php

} else{
   
    ?>
    <div class="row">
        <div class="d-flex justify-content-center">
            <h1>You are not a valid admin</h1>
            <img src="resource/error.png" height="300px"/>
        </div>
        <div class="offset-2">
                <a href="adminSignIn.php"><img src="resource/icons8-back.gif" height="300px"> </a>
        </div>

    </div>
    
    <?php
}

?>