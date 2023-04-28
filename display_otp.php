<?php

// Include the Google Authenticator library
require_once 'GoogleAuthenticator.php';

// Create a new instance of GoogleAuthenticator class
$ga = new PHPGangsta_GoogleAuthenticator();

// Set the secret key
$secret_key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456';

// Generate the OTP
$otp = $ga->getCode($secret_key);

// Start the session
session_start();

// Store the OTP in the session variable
$_SESSION['otp'] = $otp;

// Display the OTP to the user
//echo "Your OTP is: " . $otp;

$email = 'monisripunepalli@gmail.com';
$password = 'uemgiadjmoysomei';
$to = 'ysanju10@gmail.com';
$subject = 'OTPfromPython';


// Build command to execute Python script
$command = "python3 email_otp.py $email $password $to $subject $otp";

// Execute command
exec($command);




// Prompt the user to enter the OTP
echo "<form method='post' action='verify.php'>
      <input type='text' name='otp' placeholder='Enter OTP'>
      <input type='submit' value='Verify'>
      </form>";

?>
