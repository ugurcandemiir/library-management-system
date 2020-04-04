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
      <!-- ___________________ Search Bar_______ -->
      <div class="srch">
    		<form class="navbar-form" method="post" name="form1">

    				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
    				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
    					<span class="glyphicon glyphicon-search"></span>
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

  </body>
  <!-- Show/hide CSV upload form -->


</html>
