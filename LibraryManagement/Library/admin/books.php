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
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
      <!-- ___________________ Search Bar_______ -->
      <div class="srch">
    		<form class="navbar-form" method="post" name="form1">

    				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
    				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
    					<span class="glyphicon glyphicon-search"></span>
    				</button>
    		</form>
          <form class="navbar-form" method="post" name="form1">

            <input class="form-control" type="text" name="bookID" placeholder="Enter Book ID" required="">
            <button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Delete
            </button>
          </form>
    	</div>


      <h2> List Of Books</h2>
      <?php


        if(isset($_POST['submit']))
        {
          $q=mysqli_query($db,"SELECT * from books where title like '%$_POST[search]%' ");

          if(mysqli_num_rows($q)==0)
          {
            echo "Sorry! No book found. Try searching again.";
          }
          else
          {

            echo "<table class = 'table table-bordered table-hover'> ";
              echo "<tr style= 'background-color: #6db6b9e6;'>";

                  echo "<th>"; echo " ID" ; echo "</th>";
                  echo "<th>"; echo " Title " ; echo "</th>";
                  echo "<th>"; echo "Author" ; echo "</th>";
                  echo "<th>"; echo "Language" ; echo "</th>";
                  echo "<th>"; echo "Publisher " ; echo "</th>";
                  echo "<th>"; echo "Status " ; echo "</th>";
                  echo "<th>"; echo "Quantity " ; echo "</th>";
                  echo "<th>"; echo "Department " ; echo "</th>";
              echo "</tr>";

              while($row = mysqli_fetch_assoc($q))
              {
                echo "<tr>";
                echo "<td>"; echo $row['bookID']  ; echo "</td>";
                echo "<td>"; echo $row['title']  ; echo "</td>";
                echo "<td>"; echo $row['authors'] ; echo "</td>";
                echo "<td>"; echo $row['language_code'] ; echo "</td>";
                echo "<td>"; echo $row['publisher'] ; echo "</td>";
                echo "<td>"; echo $row['status'] ; echo "</td>";
                echo "<td>"; echo $row['quantity'] ; echo "</td>";
                echo "<td>"; echo $row['department'] ; echo "</td>";
                echo "</tr>";

              }
            echo "</table>";

          }
        }
        else
        {

          $res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`title` ASC;");

          echo "<table class = 'table table-bordered table-hover'> ";
            echo "<tr style= 'background-color: #6db6b9e6;'>";

                echo "<th>"; echo " ID" ; echo "</th>";
                echo "<th>"; echo " Title " ; echo "</th>";
                echo "<th>"; echo "Author" ; echo "</th>";
                echo "<th>"; echo "Language" ; echo "</th>";
                echo "<th>"; echo "Publisher " ; echo "</th>";
                echo "<th>"; echo "Status " ; echo "</th>";
                echo "<th>"; echo "Quantity " ; echo "</th>";
                echo "<th>"; echo "Department " ; echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_assoc($res))
            {
              echo "<tr>";
              echo "<td>"; echo $row['bookID']  ; echo "</td>";
              echo "<td>"; echo $row['title']  ; echo "</td>";
              echo "<td>"; echo $row['authors'] ; echo "</td>";
              echo "<td>"; echo $row['language_code'] ; echo "</td>";
              echo "<td>"; echo $row['publisher'] ; echo "</td>";
              echo "<td>"; echo $row['status'] ; echo "</td>";
              echo "<td>"; echo $row['quantity'] ; echo "</td>";
              echo "<td>"; echo $row['department'] ; echo "</td>";
              echo "</tr>";

            }
          echo "</table>";
        }






      ?>
    </div>

  </body>

</html>
