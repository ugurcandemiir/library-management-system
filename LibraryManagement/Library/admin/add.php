<?php
  include 'connection.php';
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>

    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
    <style type="text/css">

      body {
        font-family: "Lato", sans-serif;
        background-image: url("images/3_blr.jpg");
        background-size:     cover;
        transition: background-color .5s;

        }

    .sidenav {
      height:   100%;
      margin-top: 50px;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: black;
      opacity: .8;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: white;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: steelblue;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
  .srch
  {
    padding-left: 1000px;

  }

  .book
  {
      width: 400px;
      margin: 0px auto;
  }
    .form-control
  {
    background-color: black;
    opacity: .5;
    color: white;
    height: 40px;
    width: 400px;


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
                  <li><a href="student.php">Student-Information</a> </li>
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
                  <li><a href="admin_login.php">Login</a> </li>
                  <li><a href="sign_up.php">Registration</a> </li>
                  <li><a href="contact.php">Contact</a> </li>
                  <li><a href="faqs.php">FAQ's</a> </li>
            </ul>
          </nav>
        <?php
      }
     ?>
  </header>
  <!-- ___________________ Navigation Bar_______ -->


      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <br>
        <div style="color: white; margin-left: 60px; font-size: 20px;">
        <?php
         echo "&nbsp&nbsp&nbsp&nbsp&nbsp Welcome ".$_SESSION['loginuser'];
        ?>
      </div>
        <a href="add.php">Add Books</a>
        <a href="request.php">Book Request</a>
        <a href="issue_info.php">Issue Information</a>
        <a href="expired.php">Expired List</a>
      </div>

      <div id="main">
        <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
 <div class="container" style="text-align: center;">
   <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>

   <form class="book" action="" method="post">

       <input type="text" name="bookID" class="form-control" placeholder="Book id" required=""><br>
       <input type="text" name="title" class="form-control" placeholder="Book Name" required=""><br>
       <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
       <input type="text" name="language_code" class="form-control" placeholder="Language Code" required=""><br>
       <input type="text" name="publisher" class="form-control" placeholder="Publisher" required=""><br>
       <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
       <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
       <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

       <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
   </form>
 </div>
<?php
   if(isset($_POST['submit']))
   {
     if(isset($_SESSION['loginuser']))
     {
       mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bookID]', '$_POST[title]', '$_POST[authors]', '$_POST[language_code]', '$_POST[publisher]', '$_POST[status]',  '$_POST[quantity]','$_POST[department]') ;");
       ?>
         <script type="text/javascript">
           alert("Book Added Successfully.");
         </script>

       <?php

     }
     else
     {
       ?>
         <script type="text/javascript">
           alert("You need to login first.");
         </script>
       <?php
     }
   }
?>

      </div>

      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
      }
      </script>
  </body>
