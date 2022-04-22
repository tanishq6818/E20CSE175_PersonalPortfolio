<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if(1){
if (isset($_SESSION['user'])) {  
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "assignment2";
   $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM login";
   $result = $conn->query($sql);
   $user=$_SESSION["user"];
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $fname = $row["firstname"];
        $lname = $row["lastname"];
        $emaila = $row["email"];
        $passa = $row["password"];
        $DOBa = $row["DOB"];
        $statusa = $row["status"];  
        $x=$row['email'];
        if($statusa==0){
        echo "New user ".$fname.$lname."---    <a href='user.php?email=$x'>Update Status Here!</a><br><br>";
        }
        
        echo '<tr> 
                  <td>'.$fname.'</td> 
                  <td>'.$lname.'</td> 
                  <td>'.$emaila.'</td> 
                  <td>'.$passa.'</td> 
                  <td>'.$DOBa.'</td> 
                  <td>'.$statusa.'</td> 
              </tr>';
        echo "<br>";
     }
   } else {
     echo "No DATA";
   }
   echo "<br><br><form action='logout.php'><input type='submit' value='Logout'></form>";
   $conn->close();   
}
}
?>   
</body>
</html>

