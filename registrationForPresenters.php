<DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="registration.css">
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


      <form enctype="multipart/form-data" action="presenterRegistration.php" method="post">

      
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">First Name:</label>
          <input type="text" id="firstname" name="firstname" pattern="[A-Z][a-z]{0,20}(( |-)[A-Z][a-z]{0,20}){0,2}" required> 

          <label for="name">Last Name:</label>
          <input type="text" id="lastname" name="lastname" pattern="[A-Z][a-z]{0,20}(( |-)[A-Z][a-z]{0,20}){0,2}" required>
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email" pattern="[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="passwd" required>

          <label for="password2">Confirm password:</label>
          <input type="password" id="password2" name="passwd2" required>
          
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Your profile</legend>
        </fieldset>
        <fieldset>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" pattern="[0-9]{10}" required>

        <label for="institution">Institution:</label>
        <input type="text" id="institution" name="institution" pattern="[A-Z][a-z]{0,20}(( |-)[A-Z][a-z]{0,20}){0,2}" required>

        <label for="academic_degree">Academic Degree:</label>
        <input type="text" id="academic_degree" name="acdegree" pattern="[A-Z][a-z]{0,20}(( |-)[A-Z][a-z]{0,20}){0,2}" required>

        <label for="section">Section:</label>
        <select id="section" name="section">
        <?php
          $db = mysqli_connect('localhost', 'root', '', 'conferencedb');  
          $records = mysqli_query($db, "SELECT name From section");  

          while($data = mysqli_fetch_array($records))
          {
              echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
          }	
        ?>  
        </select>

        <label for="presentation_title">Presentation Title:</label>
        <input type="text" id="presentation_title" name="presentation_title" pattern="[A-Z][a-z]{0,20}(( |-)[A-Z][a-z]{0,20}){0,2}" required>

        <label for="abstract">Abstract:</label>
        <textarea id="abstract" name="abstract"></textarea>

        <label for="coauthors">Co-authors:</label>
        <input type="text" id="coauthors" name="coauthors" >

        <label for="presentation">Upload presentation:</label>
        <!--input type="hidden" name="MAX_FILE_SIZE" value="30000" -->
        <input type="file" name="file">

        <label class="form-check-label"><input type="checkbox" required="required"> I accept the Terms of Use & Privacy Policy</a></label>
        
        </fieldset>
        <button type="submit">Sign Up</button>
        <p class="message">Are you a guest? <a href="registrationForGuests.php">Register here</a></p>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="login.js"></script>
      <?php mysqli_close($db);?>
    </body>
</html>