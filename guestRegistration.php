<?php

include 'PHPMailer.php';
include 'SMTP.php';
include 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'conferencedb');

if ($db->connect_error) {
  die("Connection failed : " . $db->connect_error);
}


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$academic_degree = $_POST['acdegree'];
$phone_number = $_POST['phone'];
$institution = $_POST['institution'];

if ($_POST['passwd'] == $_POST['passwd2']) {

  $password = sha1($_POST['passwd']);//encrypt the password before saving in the database

  $query = "INSERT INTO users (FirstName, LastName, Email, Password, AcademicDegree, PhoneNumber, Institution, Role, ConferenceID) 
        VALUES('$firstname', '$lastname', '$email', '$password', '$academic_degree', '$phone_number', '$institution', 'guest', 111)";
  mysqli_query($db, $query);

  /*$_SESSION['email'] = $email;
  $_SESSION['success'] = "You are now logged in";*/
  header('location: index.php');

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
    $mail->addAddress($email, $firstname);     // Add a recipient
    $mail->addReplyTo('tecnologyoftomorrow@gmail.com', 'Information');

    $mail->Subject = "Successfull registration!";
    $mail->Body    = "Hello " . $firstname . ' ' . $lastname . "!" . "\r\n" . "You have successfully registered to our conference as a guest.";

    if (!$mail->Send()) {
        echo "Couldn't send the email.";
        echo $mail->ErrorInfo;
        exit;
    }
    echo "Successfull registration.";
    header("Location: login.php");
    exit;
}
catch (Exception $e) {
    echo "Error {$mail->ErrorInfo}";
  }

}else echo "The passwords are different!";
?>