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
$section = $_POST['section'];
$presentation_title = $_POST['presentation_title'];
$abstract = $_POST['abstract'];
$coauthors = $_POST['coauthors'];
$institution = $_POST['institution'];
$presentation = $_FILES['file']['name'];

$status = 0;
if($_FILES['file']['size']>0){
    $status = 1;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
if ($_FILES["file"]["type"] != "application/pdf" && $_FILES["file"]["type"] != "application/msword") {
    echo "Only pdf or doc files.";
    return;
}
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);


if ($_POST['passwd'] == $_POST['passwd2']) {

  $password = sha1($_POST['passwd']);//encrypt the password before saving in the database

  $query = "INSERT INTO users (FirstName, LastName, Email, Password, AcademicDegree, PhoneNumber, Institution, Role, ConferenceID) 
        VALUES('$firstname', '$lastname', '$email', '$password', '$academic_degree', '$phone_number', '$institution', 'presenter', 111)";
  mysqli_query($db, $query);

  $query = "SELECT SectionID FROM section WHERE Name = '$section'";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_assoc($result)){
    $sectionid = $row['SectionID'];
  }


  $query = "INSERT INTO paper (Title, Document, Abstract, Status, Email, SectionID, Coauthors)
        VALUES('$presentation_title', '$presentation', '$abstract', $status, '$email', $sectionid, '$coauthors')";
  mysqli_query($db, $query);

  /*echo $presentation_title;
  echo '<br>';
  echo $presentation;
  echo '<br>';
  echo $abstract;
  echo '<br>';
  echo $status;
  echo '<br>';
  echo $email;
  echo '<br>';
  echo $sectionid;
  echo '<br>';
  echo $coauthors;*/

  /*$_SESSION['email'] = $email;
  $_SESSION['success'] = "You are now logged in";*/
  

  $mail = new PHPmailer();

  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com";  
    $mail->SMTPAuth = true;                               
    $mail->Username = "tecnologyoftomorrow@gmail.com";                
    $mail->Password = "jelszo123";                           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                             

    $mail->From = "tecnologyoftomorrow@gmail.com";
    $mail->FromName = "Team ToT";
    $mail->addAddress($email, $firstname);     
    $mail->addReplyTo('tecnologyoftomorrow@gmail.com', 'Information');

    $mail->Subject = "Successfull registration!";
    $mail->Body    = "Hello " . $firstname . ' ' . $lastname . "!" . "\r\n" . "You have successfully registered to our conference as a presenter.";
    
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