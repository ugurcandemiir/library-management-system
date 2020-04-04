<?php

    $db = mysqli_connect("localhost","root","root","library");

    if(!$db)
    {
      die("Connection Failed: ". mysqli_connect_error());
    }

 ?>
