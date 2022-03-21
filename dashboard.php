<?php
include("auth_session.php");
include("db.php");


//echo "Welcome ".$_SESSION['username'];
$username= $_SESSION['username'];
?>

<html>
<head> 
    <title> Dashborad Page</title>
</head>
<body>
    <p> Hey, <?php echo $username ?> ! </p>
    <p> you are in the home page </p>
    <p> <a href="logout.php">Logout </a> </p>

    <?php 

    $query ="SELECT * FROM product where userid=(SELECT id from user where username='$username')";
    $result=mysqli_query($conn, $query);
    $num=mysqli_num_rows($result);

    echo "<table border=1>";
    echo "<tr><th>Product Name </th> <th>Price</th> </tr>";
    for ($i=1;$i<=$num;$i++)
    {
        $row=mysqli_fetch_row($result);
        echo "<tr>";
        echo "<td><a href=\"product.php?id=".$row[0]."\">".$row[1]."</a></td> <td>".$row[2]."</td></tr>";
    }
echo "</table>";
    ?>
</body>
    </html>