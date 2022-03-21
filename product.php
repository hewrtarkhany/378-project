<?php
include("auth_session.php");
include("db.php");

$id= $_GET['id'];




?>

<html>
<head> 
    <title> Product</title>
</head>
<body>

<h1> Product Details </h1>
<form method="post">
<?php 
if (isset($_POST['update'])){
    //get the new data from form
    $newpname=$_POST['pname'];
    $newprice=$_POST['price'];

    $query="UPDATE product SET pname='$newpname', price=".$newprice." where id=".$id;
    //echo $query;
    $result=mysqli_query($conn, $query);
    if ($result){
        echo "<script>alert(\"Successful Update\")</script>";
    }
}

if (isset($_POST['delete'])){
    $query="DELETE FROM product where id=".$id;
    $result=mysqli_query($conn, $query);
    if ($result){
        echo "<script>alert(\"Successful Delete\")</script>";
        //go back to dashboard

        header("Location: dashboard.php");
    }
}

$query="Select * from product where id=".$id;
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_row($result);
    echo "Product name: <input type=\"text\" name=\"pname\" value=\"".$row[1]."\"\>";
    echo "<br> <br>";
    echo "Product price: <input type=\"text\" name=\"price\" value=\"".$row[2]."\"\>";
}
?>
<br>
<input type="submit" value="update" name="update">
<input type="submit" value="delete" name="delete">
</form>
</body>
    </html>