<?php 
session_start();
if(isset($_GET['email'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $x=$_GET['email'];
    $sql = "UPDATE login SET status=1 WHERE email='$x'";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $sql = "insert into login values('','',$x);";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    }
    
    $conn->close();
    header("location:index.php");
}
?>