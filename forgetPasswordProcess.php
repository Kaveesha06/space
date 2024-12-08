<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
$num = $rs->num_rows;

if ($num > 0 ) {
    //user found
    
    Database::iud("UPDATE `user` SET `v_code` = '".$vcode."' WHERE `email` = '".$email."' ");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                    //send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //set the smtp server to send throught
        $mail->SMTPAuth = true;                             //Enable SMTP authentication
        $mail->Username = 'kaveesha06fortesting@gmail.com';  //SMTP user name 
        $mail->Password = 'mpgwfewyvbtihhiz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLSencription
        $mail->Port = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPsecure = PHPMailer::ENCRIPTION_START

        //recipient
        $mail->setFrom('kaveesha06fortesting@gmail.com', 'Lunar Arcade');
        $mail->addAddress($email);                              //Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset your account password';
        $mail->Body = '<table style="width: 100%; font-family: Franklin Gothic Medium;" >
    <tbody>
        <tr>
            <td align="center">
                <table style="max-width: 600px;">
                    <tr>
                        <td align="center">
                            <a href="#" style="font-size: 45px; font-weight: Bolt; color:black; ">Lunar Arcade</a>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h1 style="font-size:30px; line-height:45px; font-weight:600; color:chocolate ">Reset Your Password</h1>
                            <p style="margin-bottom: 24px;">You can change your password by clicking the button below...!!</p>
                            <div>
                                <a href="http://localhost/space/resetPassword.php?vcode='.$vcode.'" style="text-decoration: none; display:inline-block; border-radius: 8px; background-color:aquamarine; 
                                    color:burlywood; padding: 15px;">
                                    <span>Reset password</span>
                                </a>
                            </div>
                            <p style="margin-top: 24px;"> &hercon; If you didn\'t ask to reset your password, you can ignore this email.</p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="font-weight: 500;">&copy; 2024 LunarArcade.lk || ALL Right Reserved</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>';

        $mail->send();
        echo 'success';

    }catch (Exception $email) {
        echo "Massage could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}else {
    echo ("User not found ! Please check your Email...");
}

?>