<?php
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>


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

		body
		{
			height: 650px;
			background-image: url("images/3_blr.jpg");
			background-repeat: no-repeat;
      background-size:     cover;                      /* <------ */
      background-position: center center;

		}
		.wrapper
		{
			width: 700px;
			height: 500px;
			margin:100px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>

	<div class="wrapper">
    <div class="Logo">
          <img src="images/itu-white-logo.png">
          <h1 style =  "color: white"  >ITU Library</h1>

      </div>
      <nav>
        <ul>
              <li><a href="index.php">Home</a> </li>
              <li><a href="books.php">Books</a> </li>
              <li><a href="admin_login.php">Login</a> </li>
              <li><a href="contact.php">Contact</a> </li>
              <li><a href="faqs.php">FAQ's</a> </li>
        </ul>
      </nav>
        <br><br><br><br>
		<div style="text-align: left;">
			<h1 style="padding-right: 30px; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div style="padding-left: 270px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>

	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script>

				<?php
			}
		}
	?></div>
	
</body>
</html>
