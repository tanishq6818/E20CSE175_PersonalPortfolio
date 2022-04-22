<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
if(isset($_COOKIE["user"])){
    $user= $_COOKIE["user"];
    $pass= $_COOKIE["pass"];
    }
if($_POST){
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment2";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from login;";
$result = $conn->query($sql);
$em=$_POST['user'];
$p=$_POST['pass1'];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {    
      if($row['email']==$em && $row['password']==$p && $row['status']=='1')
      {
        session_start();
            if(isset($_POST["tick"])){
                setcookie("user",$em);
                setcookie("pass",$p);
            }
        $_SESSION["user"]=$em;
        echo "Login Successful";

        header("location:index.php");
      }
      else if($em=="admin@bennett.edu.in" && $p=="administrator")
      {
          $row['status']='1';
        session_start();
            if(isset($_POST["tick"])){
                setcookie("user",$em);
                setcookie("pass",$p);
            }
        $_SESSION["user"]=$em;
        echo "Login Successful";
        header("location:superadmin.php");
      }
       
    }
    echo "Invalid Credentials!!";
}
}


?>

    <form action="" method=POST>
        <b>
<center><u><font face="Arial" size="20px" color="#FF7A59" >Login</font></u></center>
<br>
<br>
<br>
<center><font size="40px">Username🧑</font></center>
<br>
<br>
<br>

<center>
    
<input type="text" name="user" id="user" style="width: 500px;height:50px;" value="<?php if(isset($user)){echo $user;}?>">
</center>
<br>
<br>
<br>
<center><font size="40px">Password🔑</font></center>
<br>
<br>
<br>
<center>
<input type="password" name="pass1" id="pass1" value="<?php if(isset($pass)){echo $pass;}?>" style="width: 500px;height:50px;"></center>
<br>
<br>
<br>
<center>
<input type="checkbox" name="tick" id="tick">Remember Me!</center>
<center>
    <div id="b2">
        <br>

<input type="submit" value="Ready To Enter" id="sub"></div></center>
        </b>
    </form>
</body>
</html>
