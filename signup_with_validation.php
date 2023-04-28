<?php
// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', 'vinayaka@19', 'ums');
//$conn = mysqli_connect('34.136.49.70', 'root', 'password', 'ums');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get user information from form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);

  // Generate a unique username
  $username = strtolower(str_replace(' ', '', $name)) . uniqid();

  // Hash password using bcrypt
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  // Check if email already exists in database
  $query = "SELECT * FROM students WHERE email='$email'";

  $result = mysqli_query($conn, $query);

  $query1 = "SELECT * FROM signedup_users WHERE semail='$email'";

  $result1 = mysqli_query($conn, $query1);


  
  $role = "user";
  if ((mysqli_num_rows($result) > 0) && (mysqli_num_rows($result1) == 0)){
    // Assign grants
    $query2= "CREATE USER '$name'@'localhost' IDENTIFIED BY '$password'";
    $result2 = mysqli_query($conn, $query2);
  
    $query3 = "GRANT SELECT ON ums.students TO '$name'@'localhost'";
    $result3 = mysqli_query($conn, $query3);
    // Email is unique, insert user information into database
    $query = "INSERT INTO signedup_users (sname, semail, spassword, username, phone, role) VALUES ('$name', '$email', '$hashed_password','$username','$phone','$role')";
    mysqli_query($conn, $query);
    // Redirect to success page
    echo "Your username is: $username<br>";
    echo "Your password is: $password";
    header("Location: success_signup.php");
   
    
  }elseif ((mysqli_num_rows($result) > 0) && (mysqli_num_rows($result1) >0)){
    // Email is already signed up
    
    //echo "There is already an existing account signed up with this email";
    echo '<div style="font-size: 20px; text-align: center;">There is already an existing account signed up with this email!</div>';
    
  } 
  else {
    // Email already exists, show error message
    //echo "If you would like to signup, please enroll in the university";
    echo '<div style="font-size: 20px; text-align: center;">If you would like to signup, please enroll in the university</div>';
    
    exit();
  }
}


?>




