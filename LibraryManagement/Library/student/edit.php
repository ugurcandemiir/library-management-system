<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Information</title>
  <link rel="stylesheet" type= "text/css"  href="style.css">
  <meta charset= "utf-8">
  <meta name= "viewport" content="width = device - width, initial - scale = 1">
  <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>

</head>


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
<body style="background-color: white;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php

		$sql = "SELECT * FROM student WHERE username='$_SESSION[loginuser]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result))
		{
			$firstname=$row['firstname'];
			$lastname=$row['lastname'];
			$username=$row['username'];
      $email=$row['email'];
			$password=$row['password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: steelblue;">Welcome,</span>
		<h4 style="color: steelblue;"><?php echo $_SESSION['loginuser']; ?></h4>
	</div><br><br>

	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="firstname" value="<?php echo $firstname; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="lastname" value="<?php echo $lastname; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

    <label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">



		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php

		if(isset($_POST['submit']))
		{

			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
      $email=$_POST['email'];
			$password=$_POST['password'];

			$sql1= "UPDATE student SET  firstname='$firstname', lastname='$lastname', username='$username', email='$email' , password='$password' WHERE username='".$_SESSION['loginuser']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>
