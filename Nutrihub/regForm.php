<?php
    $firstname = $_POST["fname"];
    $lastname =  $_POST["lname"];
    $pass = $_POST["pwd"];
    $email = $_POST["email"];
    $address = $_POST["addr"];
    $town = $_POST["town"];
    $postcode = $_POST["postCode"];
    $gender = $_POST["gender"];
    $weight = $_POST["weight"];
    $age = $_POST["age"];
    $height = $_POST["height"];
    $bodyFat = $_POST["BF"];
    $activity = $_POST["activity"];
    $hashed_password = sha1($pass);

// else{
//     $stmt1 = $conn->prepare("INSERT INTO customerInfo (firstname, lastname, password, email) VALUES (?,?,?,?)");
//     $stmt1->bind_param("ssss",$firstname,$lastname,$password,$email); 
//     $stmt2 = $conn->prepare("INSERT INTO customeradderess (address, town, postcode) VALUES (?,?,?)");
//     $stmt2->bind_param("sss",$address,$town,$postcode);
//     $stmt3 = $conn->preapre("INSERT INTO customerbio (gender, weight, age, height, bodyfat, activity) VALUES (?,?,?,?,?,?)");
//     $stmt3->bind_param("siiiis",$gender,$weight,$age,$height,$bodyFat,$activity);
//     $stmt1->execute();
//     $stmt2->execute();
//     $stmt3->execute(); 
//     echo "Registered Successfully";
//     $stmt1->close();
//     $stmt2->close();
//     $stmt3->close();   
//     $conn->close();

// }

    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "nutrihub";
    $conn = mysqli_connect($servername, $username, $password, $dbname);  
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
        $sql = "INSERT INTO custinfo (email, firstname, lastname, password, address, town, postcode, gender, weight, age, height, bodyfat, activity) 
        VALUES ('$email','$firstname','$lastname','$hashed_password','$address','$town','$postcode','$gender','$weight','$age','$height','$bodyFat','$activity')";
       
        if ($conn->query($sql)== TRUE){
           
            logIn($email,$hashed_password);
            }
            else{
            echo "Error: ". $sql ."
            ". $conn->error;
            }
        
    
        $conn->close();

        require(__DIR__ . '/../vendor/autoload.php');

        // Calculations based on weight, height and age
        use isfonzar\TDEECalculator\TDEECalculator;
    
        $tdeeCalculator = new TDEECalculator();
    
        echo $tdeeCalculator->calculate($gender, $weight, $height, $age, $activity);
        echo "\n";




        function logIn($email, $hashed_password){
            session_start();
            $_SESSION['user'] = $email;
            $_SESSION['pass'] = $hashed_password;
            header("Location: macroSelect.html"); 
            exit;
            }
            
            
    
?>
