<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

    <header>
        <a href="#" class="logo">TOT<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index.php#banner" onclick="toggleMenu();">Home</a></li>
            <li><a href="index.php#about" onclick="toggleMenu();">About</a></li>
            <li><a href="index.php#speakers" onclick="toggleMenu();">Speakers</a></li>
            <li><a href="index.php#faq" onclick="toggleMenu();">FAQ</a></li>
            <li><a href="index.php#contact" onclick="toggleMenu();">Contact</a></li>
            <li><a href="login.php" class="login_btn">Login</a></li>
        </ul>
    </header>


      <form action="loginUsers.php" method="post">
      
        <h1>Sign In</h1>

          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="passwd">

          
        <button type="submit">Login</button>
        <p class="message"><a href="forgotPasswd.php">Forgot your password?</a></p>
        <p class="message">Not register yet?</p>
        <p class="message">Register here as <a href="registrationForPresenters.php">presenter</a> or as a <a href="registrationForGuests.php">guest.</a></p>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="login.js"></script>
    </body>
</html>