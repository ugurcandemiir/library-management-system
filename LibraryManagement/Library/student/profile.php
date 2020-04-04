
 <?php
 	include "connection.php";
  session_start();

  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Profile</title>

</style>
    <link rel="stylesheet" type= "text/css"  href="style.css">
    <meta charset= "utf-8">
    <meta name= "viewport" content="width = device - width, initial - scale = 1">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>

  </head>
  <body>


    <div class="wrapper">


        <header>
        <div class="Logo">
            <img src="images/itu-white-logo.png">
            <h1 style =  "color: white"  >ITU Library</h1>
        </div>
        <?php
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
  			?>
        <br><br><br><br>

  			<?php
        if(isset($_POST['submit1']))
              {
                ?>
                  <script type="text/javascript">
                    window.location="edit.php"
                  </script>
                <?php
              }
          $q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[loginuser]' ;");

  				$row=mysqli_fetch_assoc($q);

  			?>
        <br><br><br>
        <h2 style="text-align: center;">My Profile</h2>

  			<div style="text-align: center;"> <b>Welcome, </b>
 	 			<h4>
 	 				<?php echo $_SESSION['loginuser']; ?>
 	 			</h4>
  			</div>
  			<?php


  				echo "<b>";
  				echo "<table class='table table-bordered'>";
 	 				echo "<tr>";

          echo "<tr>";
            echo "<td>";
              echo "<b> Student ID: </b>";
            echo "</td>";
            echo "<td>";
              echo $row['studentid'];
            echo "</td>";
          echo "</tr>";

 	 					echo "<td>";
 	 						echo "<b> First Name: </b>";
 	 					echo "</td>";

 	 					echo "<td>";
 	 						echo $row['firstname'];
 	 					echo "</td>";
 	 				echo "</tr>";

 	 				echo "<tr>";
 	 					echo "<td>";
 	 						echo "<b> Last Name: </b>";
 	 					echo "</td>";
 	 					echo "<td>";
 	 						echo $row['lastname'];
 	 					echo "</td>";
 	 				echo "</tr>";

 	 				echo "<tr>";
 	 					echo "<td>";
 	 						echo "<b> User Name: </b>";
 	 					echo "</td>";
 	 					echo "<td>";
 	 						echo $row['username'];
 	 					echo "</td>";
 	 				echo "</tr>";

 	 				echo "<tr>";
 	 					echo "<td>";
 	 						echo "<b> Password: </b>";
 	 					echo "</td>";
 	 					echo "<td>";
 	 						echo $row['password'];
 	 					echo "</td>";
 	 				echo "</tr>";

 	 				echo "<tr>";
 	 					echo "<td>";
 	 						echo "<b> Email: </b>";
 	 					echo "</td>";
 	 					echo "<td>";
 	 						echo $row['email'];
 	 					echo "</td>";
 	 				echo "</tr>";

  				echo "</table>";
  				echo "</b>";
  			?>
        <form action="" method="post">
        <button class="btn btn-default" style="float: right; width: 100px;" name="submit1">Edit</button>
      </form>
  		</div>
  	</div>
  </body>
  </html>
