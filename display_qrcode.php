


<?php
// Load the Google Authenticator library
require_once 'GoogleAuthenticator.php';

// Create a new GoogleAuthenticator object
$ga = new PHPGangsta_GoogleAuthenticator();

// Generate a new secret key
$secret_key = $ga->createSecret();

// Generate the QR code URL
$qr_code_url = $ga->getQRCodeGoogleUrl('MyApp1', $secret_key);

// Set the time interval for OTP generation
$time_interval = 120; // 2 minutes

// Check if the OTP form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered OTP
    $otp = $_POST['otp'];

    // Verify the OTP
    $is_valid = $ga->verifyCode($secret_key, $otp);

    if ($is_valid) {
        echo "OTP is valid!";
    } else {
        echo "OTP is invalid!";
    }
}

?>

<!-- Display the QR code -->
<img src="<?php echo $qr_code_url; ?>">

<!-- Display the OTP form -->
<form method="POST">
    <label>Enter the OTP:</label>
    <input type="text" name="otp">
    <button type="submit">Verify OTP</button>
</form>




