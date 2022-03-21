<?php
include ("db.php");

if (isset($_POST['submit']))
{
    

    $username=$_POST['username'];
    $pass=$_POST['password'];
    $birth=$_POST['birth'];
    $address=$_POST['address'];
    $country=$_POST['mycountry'];
    $zip=$_POST['zip'];
    $email=$_POST['email'];

    if(isset($_POST['male'])){
        $gender="male";
    }
    else {
        $gender="female";
    }

    if(isset($_POST['en'])){
        $language="english";
    }
    else {
        $language="no english";
    }

    $desc=$_POST['desc'];

    $query="INSERT INTO USER (USERNAME, PASSWORD, BirthDate, Address, Country, zip, email, gender, language, about)"
    ." VALUES ('$username','".md5($pass)."','$birth','$address',".$country.",".$zip.",'$email','$gender','$language','$desc')";
  // echo $query;
  $result=mysqli_query($conn, $query);
  if ($result){

    session_start();
    $_SESSION['username']=$username;
    header("Location: dashboard.php");
  }
  else {
      echo "<script> alert(\"Cannot register\");</script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>JavaScript Form Validation using a sample registration form</title>

</head>
<body>
<h1>Registration Form</h1>
<form name="registration" method="post">
<table width="30%">
<tr> <td><label for="userid">User id:</label></td>
<td><input type="text" size="50" name="userid"/></td><tr>


<tr><td> <label for="passid">Password:</label></td>
<td><input type="password"  size="50" name="password" /></td></tr>

<tr>
<td><label for="username">Name:</label></td>
<td><input type="text"  size="50" id="fn" name="username"/></td></tr>
<tr>
    <td><label for="Birthdate">Birth Date:</label></td>
    <td><input type="date"  size="50" name="birth" /></td></tr>
<tr>
<td><label for="address">Address:</label></td>
<td><input type="text"  size="50" name="address"/></td>
</tr>
<tr>
<td><label for="country">Country:</label></td>
<td>
    <?php 
$q="SELECT * from country";
$result=mysqli_query($conn, $q);
$num= mysqli_num_rows($result);

echo "<select name=\"mycountry\">";
echo "<option value=0>Select Country </option>";
for ($i=1; $i<$num; $i++)
{
    $row=mysqli_fetch_row($result);
    echo "<option value =".$row[0].">".$row[1]."</option>";


}

echo "</select>";
    
    ?>

</td>
</tr>
<tr>
<td><label for="zip">ZIP Code:</label></td>
<td><input type="number" name="zip" /></td>
</tr>
<tr>
<td><label for="email">Email:</label></td>
<td><input type="text" size="50" name="email" /></td>
</tr>
<tr>
<td><label >Sex:</label></td>
<td><input type="radio"  value="Male" name="male" /><span>Male</span>
<input type="radio"  value="Female" name="female" /><span>Female</span></td>
</tr>
<tr>
<td><label>Language:</label></td>
<td><input type="checkbox"  value="en" name="en" /><span>English</span>
<input type="checkbox" value="noen" name="noen" /><span>Non English</span></td>
</tr>
<tr>

<td><label for="desc">About:</label></td>
<td><textarea name="desc" cols="40" rows="7" name="desc"></textarea></td>
</tr>
</table>
<input type="submit" value="Register" name="submit"/>
<p> already have an account go to <a href="login.php">Login</a></p>
</form>
</body>
</html>
