<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<form> 
  <div class="container">
    <p>Academic Details...</p>    
    <input type="text" placeholder="Enter Branch/Yr" name="branch" id="branch">
    <p>Academic Skills...</p>    
    <input type="text" placeholder="Enter Skills" name="skills" id="skills">
    <br>
    <button type="submit"><b>Submit Now</b></button>
  </div>
</form>
</center>
</body>
</html>
<?php
if($_POST){
  if($_GET)
  {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$x=$_GET['email'];
$a=$_POST['branch'];
$b=$_POST['skills'];
$sql = "UPDATE login SET branch='$a',skills='$b' WHERE email='$x'";

if ($conn->query($sql) === TRUE ) {
  header('location:index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}$sql = "insert into login values('','',$x);";
$conn->close();
}
}

?>