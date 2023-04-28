<?php

// Start the session
session_start();

// Retrieve the OTP from the session variable
$otp = $_SESSION['otp'];

// Get the user input
$user_otp = $_POST['otp'];

// Include the Google Authenticator library
require_once 'GoogleAuthenticator.php';

// Create a new instance of GoogleAuthenticator class
$ga = new PHPGangsta_GoogleAuthenticator();

// Set the secret key
$secret_key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456';

// Verify the OTP
$is_valid = $ga->verifyCode($secret_key, $user_otp);

if ($is_valid) {
  // OTP is valid, do something
  header("Location: success_login.php");
} else {
  // OTP is invalid, do something else
  echo "OTP is invalid!";
}

?>
