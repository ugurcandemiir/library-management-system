<?php
  include 'connection.php';
  session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
    <style type="text/css">

    .login_box
    {
      width: 500px;
      height: 300px;
      margin:100px auto;
      background-color: black;
      opacity: .5;
      color: white;
      padding: 27px 15px;
    }
    </style>
</head>
<body>
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
  <div class="log_img">
      <br> <br><br>
      <div class="login_box">
          <h3 style="text-align: center; font-size: 35px;font-family: Arial;">ITU Library System</h3><br>
          <h3 style="text-align: center; font-size: 25px;">User Login Form</h3><br>
        <form name="login" action="" method="post">
          <br><br>
          <div class="login">
              <input type="text" name="username" placeholder="Username" required=""> <br><br>
              <input type="password" name="password" placeholder="Password" required=""> <br><br>
              <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 60px; height: 30px">
            </div>

        <p style="color: white; padding-left: 40px;">
          <br><br>
          <a style="color:white;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          New to this website?<a style="color: white;" href="sign_up.php">Sign Up</a>
        </p>
      </form>
      </div>
    </div>
</section>

  <?php
    if (isset($_POST['submit']))
    {
        $count = 0;
        $res = mysqli_query($db,"SELECT * FROM `student` WHERE username = '$_POST[username]' AND password = '$_POST[password]' ;");
        $count = mysqli_num_rows($res);

        if($count == 0)
        {
          ?>
              <script type="text/javascript">
               alert("The username and password doesn't match.");
              </script>
          <?php
        }
        else
        {
          $_SESSION['loginuser'] = $_POST['username']
          ?>
              <script type="text/javascript">
                  window.location = "index.php"
              </script>
          <?php
        }

    }

  ?>

</body>
</html>
