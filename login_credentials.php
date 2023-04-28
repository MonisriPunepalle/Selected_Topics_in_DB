<?php
// Get the user's data from a form or other source
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Generate a unique username
$username = strtolower(str_replace(' ', '', $name)) . uniqid();

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo "Your username is: $username<br>";
echo "Your password is: $password";
echo "Your password is: $hashedPassword";

// Connect to the database
$conn = mysqli_connect('localhost', 'root', 'vinayaka@19', 'UMS');

// Insert the user's data into the database
$sql = "INSERT INTO credentials (sname, semail, phone, username, spassword) VALUES ('$name', '$email', '$phone', '$username', '$hashedPassword')";
mysqli_query($conn, $sql);

// Provide the user with their login credentials
echo "Your username is: $username<br>";
echo "Your password is: $password";
?>
