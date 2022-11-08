<?php

        include 'PHPMailer.php';
        include 'SMTP.php';
        include 'Exception.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        $db = mysqli_connect('localhost', 'root', '', 'conferencedb');

        function securityCode() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }

        session_start();
        $_SESSION["forgotpasswd"] = securityCode();
        $_SESSION["email"] = $_POST["email"];

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
            $mail->addAddress($_SESSION["email"]);     // Add a recipient
            $mail->addReplyTo('tecnologyoftomorrow@gmail.com', 'Information');

            $mail->Subject = "Password reset";
            $mail->Body    = "Security code: " . $_SESSION["forgotpasswd"];

            if (!$mail->Send()) {
                echo "Couldn't send the email.";
                echo $mail->ErrorInfo;
                exit;
            }
            echo "Securty code is sent.";
            header("Location: resetPasswd.php");
            exit;
        }
        catch (Exception $e) {
            echo "Error {$mail->ErrorInfo}";
        }

     ?>