
<?php
$servername = "insert your servername";
$username = " insert your username";
$password = "insert your password";
$dbname = "insert your database name";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert  into database

$sql = "INSERT INTO tableName (name, email, message) VALUES ('$name', '$email', '$message' )";

use PHPMailer\PHPMailer\PHPMailer; // Phpmail package already on server
use PHPMailer\PHPMailer\Exception; // Phpmail package already on server

require 'PHPMailer/src/PHPMailer.php'; // Phpmail package already on server
require 'PHPMailer/src/SMTP.php'; // Phpmail package already on server

$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Host = "localhost"; // sets the SMTP server or use the server hostname
$mail->Port = 25; // set the SMTP port for the GMAIL server
$mail->Username = "companymail@company.com"; // SMTP account username
$mail->Password = "mail password here"; // SMTP account password

$mail->SetFrom('companymail@company.com');
$mail->AddReplyTo("companymail@company.com");
$mail->Subject = "Contact form submitted";
$mail->MsgHTML("<html><body><em>Below is the details of the new record! </em><br><br><br><strong>Name:</strong> $name,<br><br><strong>Email:</strong> $email,<br><br><strong>Message:</strong> $message</body></html>");

$mail->AddAddress("companymail@company.com");
//$mail->AddAttachment(""); // attachment

//If the form is submitted successfully
if (!$mail->Send()){

} elseif (mysqli_query($conn, $sql)){

}
?>


}
mysqli_close($conn);




// Close connection

?>
