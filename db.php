<?php


$conn=mysqli_connect("localhost","root","") or die("Could not connect :".mysqli_error($conn));

mysqli_select_db($conn,"testdb") or die("Could not connect to db:".mysqli_error($conn));;

?>