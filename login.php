<?php
session_start();
include("db.php");

if (isset ($_POST['submit'])){

    $username=$_POST['username'];
    $pass=$_POST['password'];

    if ($username &&$pass){
        $query="SELECT id from user where username='$username' and password='".md5($pass)."'";
        $result=mysqli_query($conn, $query);
        $num=mysqli_num_rows($result);
        if ($num==1){
            $_SESSION['username']=$username;
            //correct login
            header("Location: dashboard.php");
        }
        else{
            //incorrect username/pass
            echo "Incorrect username/pass";
        }
    }
}
?>

<html>

    <head> <title> Login </title> </head>
    <body>

    <form method="post" action="">
        <p> Username  <input type ="text" name="username"> </p> <br>
        <p> Password <input type="password" name= "password"></p> <br>
        <input type ="submit" value="Login in" name="submit">
        <br>

        <p> No Account <a href="register.php">Register Here </a></p>
</form>
</body>
    </html>