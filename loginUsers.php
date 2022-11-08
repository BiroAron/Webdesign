<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'conferencedb');

if ($db->connect_error) {
  die("Connection failed : " . $db->connect_error);
}

$email = $_POST['email']; 
$password = sha1($_POST['passwd']);

$query = "SELECT Password, FirstName, Role FROM users WHERE Email='$email'";

$result = $db->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row['Password'];
        if ($password == $row['Password']) {
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["role"]=$row['Role'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['FirstName'];
            header("Location: index2.php");
        } else {
            echo "Wrong password or email adress.";
            echo $query = "SELECT Password, FirstName, Role FROM users WHERE Email='andras.kiss@gmail.com'";
            //header("Location: index2.php");
        }
    }
}

?>