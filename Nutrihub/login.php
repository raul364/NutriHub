<?php
session_start(); // Starting Session

$email = $_POST["email"];
$pass = $_POST["pass"];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "nutrihub";
    $conn = mysqli_connect($servername, $username, $password, $dbname);  
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
// To protect MySQL injection for Security purpose
$hashed_password = sha1($pass);

// SQL query to fetch information of registerd users and finds user match.
$sql = ("SELECT * FROM custinfo WHERE email = '$email' AND password ='$hashed_password'");
$result = $conn->query($sql);
if (mysqli_num_rows($result) == 1){
  echo("password correct");  
  $_SESSION['login_user']=$email; // Initializing Session    
  header("location:file:///D:/xampp/htdocs/Nutrihub/macroSelect.html");
  exit;
}else {
  echo($email);
  echo($hashed_password);
  $error = "Username or Password is invalid";
  echo($error);    
} 



mysqli_close($conn);

?>