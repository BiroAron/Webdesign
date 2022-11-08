<?php

        include 'PHPMailer.php';
        include 'SMTP.php';
        include 'Exception.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        $db = mysqli_connect('localhost', 'root', '', 'conferencedb');

        $secCode = $_POST["sec_code"];
        $password1 = $_POST["passwd"];
        $password2 = $_POST["passwd2"];

        session_start();

        if($_SESSION["forgotpasswd"] == $secCode){
            if($password1 == $password2){

                $email = $_SESSION["email"];
                $shapasswd = sha1($password1);

                $query="UPDATE users SET Password = '$shapasswd' WHERE Email = '$email'";
                mysqli_query($db, $query);


                $mail = new PHPmailer();

                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Mailer = "smtp";
                    $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = "tecnologyoftomorrow@gmail.com";                 // SMTP username
                    $mail->Password = "jelszo123";                           // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                             // Enable encryption, 'ssl' also accepted

                    $mail->From = "tecnologyoftomorrow@gmail.com";
                    $mail->FromName = "Team ToT";
                    $mail->addAddress($email);     // Add a recipient
                    $mail->addReplyTo('tecnologyoftomorrow@gmail.com', 'Information');

                    $mail->Subject = "Password Successfully Reseted";
                    $mail->Body    = "Your password has been reseted sucessfully.";

                    if (!$mail->Send()) {
                        echo "Couldn't send the email.";
                        echo $mail->ErrorInfo;
                        exit;
                    }
                    echo "Password is reseted.";
                    header("Location: index.php");
                    exit;
                }
                catch (Exception $e) {
                    echo "Error {$mail->ErrorInfo}";
                }

            }
            else{
                echo "Passwords aren't matching.";
            }

        }
        else{
            echo "Wrong security code.";
        }

        

     ?>