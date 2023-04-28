<?php

require_once ('C:\xampp\htdocs\UMS\GoogleAuthenticator.php');
// Connect to the database
$ga = new PHPGangsta_GoogleAuthenticator();
$secret_key = $ga->createSecret();

$conn = mysqli_connect('localhost', 'root', 'vinayaka@19', 'UMS');




// Retrieve user input from login form
$email = $_POST['email'];
$password = $_POST['password'];

// Add secret key to signedup users
$query5 = "UPDATE signedup_users set secret_key = '$secret_key' where semail='$email'";
$res = mysqli_query($conn, $query5);

//qr code generator
$qr_code_url = $ga->getQRCodeGoogleUrl('MyApp1', $secret_key);
echo "<img src='$qr_code_url'>";


// Generate the OTP
$otp = $ga->getCode($secret_key);

echo "generated otp is" .$otp;
// Query the database to retrieve hashed password
$stmt = $conn->prepare("SELECT spassword,secret_key FROM signedup_users WHERE semail = ?");

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows == 0) {
    echo "No rows returned from query: " . $stmt->error;
    return;
}

//$hashed_password = $row['spassword'];
//$secret_key = $row['secret_key'];
if ($row != null) {
    $hashed_password = $row['spassword'];
    $secret_key = $row['secret_key'];
}
else {
    echo "Error: row is null.";
    return;
}

echo $hashed_password;
echo $secret_key;

// Prompt the user to enter a one-time password
echo "<form method='POST'>";
echo "<label for='email'>Email:</label>";
echo "<input type='email' id='email' name='email'><br><br>";

echo "<label for='password'>Password:</label>";
echo "<input type='password' id='password' name='password'><br><br>";

echo "<label for='otp'>Enter the OTP:</label>";
echo "<input type='text' id='otp' name='otp'><br><br>";

echo "<input type='submit' value='Submit'>";
echo "</form>";


// Check if the OTP has been submitted
if (!empty($_POST['otp'])) {
    $otp = $_POST['otp'];
    $email = $email;
    $password = $password;
    $secret_key = $secret_key;

    echo $otp;
    echo $email;
    echo $password;
    echo $secret_key;
    $is_verified = $ga->verifyCode($secret_key, $otp);
    if (!$is_verified) {
        // Authentication failed
        echo "Invalid one-time password";
        return;
    } else {
        // OTP verification succeeded, continue with login
        //Validate the password using password_verify()
        if (password_verify($password, $hashed_password)) {
            log_login($conn,$email, $_SERVER['REMOTE_ADDR']);
    
        //echo"Success-redirecting to portal";
             header("Location: success_login.php");
        } else {
    // Password is incorrect, show an error message and allow the user to try again
    //echo"Incorrect password or incorrect login";
    echo '<div style="font-size: 20px; text-align: center;">Incorrect password or incorrect login</div>';
}
    }
} 
else {
    // OTP has not been submitted yet
    return;
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


