<?php

session_start();
include "connection.php";

    $username = $_POST["u"];
    $password = $_POST["p"];

    // echo($username);

    if (empty($username)) {
        echo ("Please Enter Your Username");
    }else if (empty($password)) {
        echo("Please Enter Your Password");
    }else {

        // echo ("Done");

        $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."'");
        $num = $rs->num_rows;

        if ($num == 1) {

            $d = $rs->fetch_assoc();

            if($d["user_type_utype_id"]==1) {
                echo ("Success");

                $_SESSION["a"] = $d;
            }else {
                echo("Ypu don't have an admin Account");
            } 
        }else{
            echo ("Invalid user name or password");
        }
    }


?>