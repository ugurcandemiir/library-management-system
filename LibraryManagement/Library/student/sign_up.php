<?php
  include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
    <style type="text/css">

    .sign_up_box
    {
      width: 500px;
      height: 450px;
      margin:100px auto;
      background-color: black;
      opacity: .5;
      color: white;
      padding: 27px 15px;
    }
    .form sign_up{
      direction: rtl;
    }
    .login{
      direction: center;
    }
    </style>
</head>
  <body>
  <header>
  <div class="Logo">
        <img src="images/itu-white-logo.png">
        <h1 style =  "color: white"  >ITU Library</h1>
    </div>
        <nav>
          <ul>
                <li><a href="index.php">Home</a> </li>
                <li><a href="books.php">Books</a> </li>
                <li><a href="student_login.php">Student-Login</a> </li>
                <li><a href="sign_up.php">Registration</a> </li>
                <li><a href="">Contact</a> </li>
                <li><a href="">FAQ's</a> </li>
          </ul>
        </nav>
  </header>
  <section>
    <div class="log_img">
        <br> <br><br>
        <div class="sign_up_box">
            <h3 style="text-align: center; font-size: 35px;font-family: Arial;">ITU Library System</h3><br>
            <h3 style="text-align: center; font-size: 25px;">User Registration Form</h3><br>
          <form name="sign_up" action="" method="post">
            <br>
            <div class="login">
                <input type="text" name="firstname" placeholder="First Name" required=""> <br><br>
                <input type="text" name="lastname" placeholder="Last Name" required=""> <br><br>
                <input type="username" name="username" placeholder="Username" required=""> <br><br>
                <input type="text" name="email" placeholder="Email Address" required=""> <br><br>
                <input type="text" name="schoolid" placeholder="School Number" required=""> <br><br>
                <input type="password" name="password" placeholder="Password" required=""> <br><br>
                <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px">
            </div>
          </form>


        </div>
      </div>
  </section>
    <?php

      if(isset($_POST['submit']))
      {
        $count=0;


        /*$sql="SELECT schoolid from `student`";*/
        $res=mysqli_query($db,"SELECT * FROM `student` WHERE username = '$_POST[username]' AND schoolid = '$_POST[schoolid]' ;");

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['schoolid']==$_POST['schoolid'] AND $row['username']==$_POST['username'] )
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          /*  $signup = $db -> prepare("INSERT INTO `STUDENT` firstname =  :firstname, lastname = :lastname, :email = email , :schoolid = schoolid, :password = password");
            $temp = $signup -> execute(array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'email' => $_POST['email'], 'schoolid' => $_POST['schoolid'], 'password' => $_POST['password']));*/
          mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[email]','$_POST[schoolid]','$_POST[password]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The school number and username are already exist.");
            </script>
          <?php

        }

      }

    ?>


  </body>
</html>
