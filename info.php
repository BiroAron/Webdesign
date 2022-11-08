<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Of Tomorrow - Conference</title>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <header>
        <a href="#" class="logo">TOT<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index2.php#banner" onclick="toggleMenu();">Home</a></li>
            <li><a href="index2.php#about" onclick="toggleMenu();">About</a></li>
            <li><a href="index2.php#speakers" onclick="toggleMenu();">Speakers</a></li>
            <li><a href="index2.php#faq" onclick="toggleMenu();">FAQ</a></li>
            <li><a href="index2.php#contact" onclick="toggleMenu();">Contact</a></li>
            <li id = "optional" dispay = "none"><a href="info.php" onclick="toggleMenu();" display = "none">Info</a></li>
            <li>
                <a class="name">
                    <?php
                        echo " Hello " . $_SESSION["name"]. " ";
                    ?>
                </a>
            </li>
            <li><a href="index.php" class="login_btn">Logout</a></li>
        </ul>
    </header>
    <body>

    <table border = 1 cellspacing = 0 cellpadding = 10>
        <tr class="table" id="table">
            <td>#</td>
            <td>Section</td>
            <td>Presentation name</td>
            <td>Status</td>
            <td>Document</td>
            <td>Author and co-authors</td>
        </tr>
        <?php
            $i=1;
            $conn = new mysqli("localhost", "root", "", "conferencedb");
            $email = $_SESSION["email"];
            
            $queryForRole = "SELECT Role FROM users WHERE Email = '$email'";
            $result = mysqli_query($conn, $queryForRole);

            while ($row = mysqli_fetch_assoc($result)){
                $_SESSION["role"] = $row["Role"];
            }

            if($_SESSION["role"] === "presenter"){
                $query = "SELECT FirstName, LastName, Title, Document, Status, Coauthors, section.Name FROM paper INNER JOIN users ON paper.Email=users.Email INNER JOIN section ON paper.SectionID = section.SectionID WHERE paper.Email = '$email'";
            }elseif($_SESSION["role"] === "admin"){
                $query = "SELECT FirstName, LastName, Title, Document, Status, Coauthors, section.Name FROM paper INNER JOIN users ON paper.Email=users.Email INNER JOIN section ON paper.SectionID = section.SectionID";
            }elseif($_SESSION["role"] === "guest"){
                echo "<script> document.getElementById('optional').style.display = 'none'; </script>";
                header('location: index2.php');
            }
            $result = mysqli_query($conn, $query);


        ?>


        <?php
            while ($row = mysqli_fetch_assoc($result)) :?>
        <tr calss="table" id="table">
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["Name"]; ?></td>
            <td><?php echo $row["Title"]; ?></td>
            <td><?php echo $row["Status"]; ?></td>
            <td><a href="uploads/<?php echo $row['Document']; ?>"><?php echo $row['Document']; ?></a></td>
            <td><?php echo $row["FirstName"] . " " . $row["LastName"] . ", " .$row["Coauthors"]; ?></td>
        </tr>
        <?php endwhile; ?> 
    </table>
    </body>
</html>
