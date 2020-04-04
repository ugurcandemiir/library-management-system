
<?php
  include 'connection.php';
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>

    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
    <style type="text/css">
  .srch
  {
    padding-left: 1000px;

  }

  body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
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
      <!-- ___________________ Search Bar_______ -->
      <div class="srch">
    		<form class="navbar-form" method="post" name="form1">

    				<input class="form-control" type="text" name="search" placeholder="Student username .." required="">
    				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
    					<span class="glyphicon glyphicon-search"></span>
    				</button>
    		</form>
    	</div>


      <h2> List Of Students</h2>
      <?php


        if(isset($_POST['submit']))
        {
          $q=mysqli_query($db,"SELECT firstname,lastname,username,email,schoolid FROM `student` where username like '%$_POST[search]%' ");

          if(mysqli_num_rows($q)==0)
          {
            echo "Sorry! No student found. Try searching again.";
          }
          else
          {

            echo "<table class = 'table table-bordered table-hover'> ";
              echo "<tr style= 'background-color: #6db6b9e6;'>";

                  echo "<th>"; echo "Schoolid " ; echo "</th>";
                  echo "<th>"; echo " First" ; echo "</th>";
                  echo "<th>"; echo " Last " ; echo "</th>";
                  echo "<th>"; echo "Username" ; echo "</th>";
                  echo "<th>"; echo "Email" ; echo "</th>";
              echo "</tr>";

              while($row = mysqli_fetch_assoc($q))
              {
                echo "<tr>";
                echo "<td>"; echo $row['schoolid']  ; echo "</td>";
                echo "<td>"; echo $row['firstname']  ; echo "</td>";
                echo "<td>"; echo $row['lastname'] ; echo "</td>";
                echo "<td>"; echo $row['username'] ; echo "</td>";
                echo "<td>"; echo $row['email'] ; echo "</td>";

                echo "</tr>";

              }
            echo "</table>";

          }
        }
          else
          {
            $res = mysqli_query($db,"SELECT * FROM `student` ORDER BY `student`.`firstname` ASC;");

            echo "<table class = 'table table-bordered table-hover'> ";
              echo "<tr style= 'background-color: #6db6b9e6;'>";

                echo "<th>"; echo "Schoolid " ; echo "</th>";
                echo "<th>"; echo " First" ; echo "</th>";
                echo "<th>"; echo " Last " ; echo "</th>";
                echo "<th>"; echo "Username" ; echo "</th>";
                echo "<th>"; echo "Email" ; echo "</th>";
                echo "</tr>";

              while($row = mysqli_fetch_assoc($res))
              {
                echo "<tr>";
                echo "<td>"; echo $row['schoolid']  ; echo "</td>";
                echo "<td>"; echo $row['firstname']  ; echo "</td>";
                echo "<td>"; echo $row['lastname'] ; echo "</td>";
                echo "<td>"; echo $row['username'] ; echo "</td>";
                echo "<td>"; echo $row['email'] ; echo "</td>";

                echo "</tr>";

              }
            echo "</table>";


          }
      ?>

  </body>

  <!-- Show/hide CSV upload form -->


</html>
