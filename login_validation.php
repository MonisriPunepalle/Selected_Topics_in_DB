<?php

$conn = mysqli_connect('localhost', 'root', 'vinayaka@19', 'UMS');

//$conn = mysqli_connect('34.136.49.70', 'root', 'password', 'ums');

// Retrieve user input from login form
$email = $_POST['email'];
$password = $_POST['password'];

// Query the database to retrieve hashed password
$stmt = $conn->prepare("SELECT spassword FROM signedup_users WHERE semail = ?");

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$hashed_password = $row['spassword'];
    



        // OTP verification succeeded, continue with login
        //Validate the password using password_verify()
        if (password_verify($password, $hashed_password)) {
            log_login($conn,$email, $_SERVER['REMOTE_ADDR']);
    
        //echo"Success-redirecting to portal";
             header("Location: display_otp.php");
        } else{
            
                // Password is incorrect, show an error message and allow the user to try again
                //echo"Incorrect password or incorrect login";
                echo '<div style="font-size: 20px; text-align: center;">Incorrect password or incorrect login</div>';
            }
        
// Close the database connection
mysqli_close($conn);

function log_login($conn,$email, $ip_address) {
    // Connect to the MySQL database
        //$mysqli = new mysqli('localhost', 'root', 'vinayaka@19', 'UMS');
    
    // Escape the variables to prevent SQL injection
     $email = $conn->real_escape_string($email);
     $ip_address = $conn->real_escape_string($ip_address);
    
   
    $query1 = "SELECT * FROM login_logs WHERE ip_address = '$ip_address' and email = '$email'";

    $res = mysqli_query($conn, $query1);
  
    // Insert the login information into the login_logs table
    if (mysqli_num_rows($res) == 0){
        echo " You are trying to login from new system";
    }
      
    $conn->query("INSERT INTO login_logs (email, ip_address, login_time) VALUES ('$email', '$ip_address', NOW())");
    
    // Close the database connection
     //$conn->close();
    }
  
?>


