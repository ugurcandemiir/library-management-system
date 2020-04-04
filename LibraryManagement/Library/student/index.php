
<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
      ITU Library Management System
    </title>
    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
</head>

<body>
  <div class="wrapper">

      <header>
      <div class="Logo">
          <img src="images/itu-white-logo.png">
          <h1 style =  "color: white"  >ITU Library</h1>
      </div>
      <?php
          if(isset( $_SESSION['loginuser']))
          { ?>
            <nav>
              <ul>
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="books.php">Books</a> </li>
                    <li><a href="profile.php">Profile</a> </li>
                    <li><a href="logout.php">Logout</a> </li>
                    <li><a href="contact.php">Contact</a> </li>
                    <li><a href="faqs.php">FAQ's</a> </li>
              </ul>
            </nav>
            <?php
          }
          else
          {?>
            <nav>
              <ul>
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="books.php">Books</a> </li>
                    <li><a href="student_login.php">Student-Login</a> </li>
                    <li><a href="sign_up.php">Registration</a> </li>
                    <li><a href="contact.php">Contact</a> </li>
                    <li><a href="faqs.php">FAQ's</a> </li>
              </ul>
            </nav>
          <?php
        }
       ?>

      </header>

      <section>
      <div class = "section_image">
            <br><br><br>
            <div class="box">
              <br><br><br><br><br><br>
              <h1 style = "text-align:center" >Welcome</h1><br>
            </div>
      </div>
      </section>

      <footer>
        <?php
          include "footer.php"
        ?>
      </footer>
  </div>


</body>
</html>
