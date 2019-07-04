<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'vendor/autoload.php';
require 'mailpass.inc.php';

if(isset($_POST['reset-request-submit'])){

	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "create-new-password.php?selector=" .$selector. "&validator=" .bin2hex($token);

	$expires = date("u") + 1800;

	require '../connect.php';

	$userEmail = $_POST["email"];

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "There was an error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
	}

	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?)";

	$stmt = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "There was an error";
		exit();
	}else{
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($db);




// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = Email;                     // SMTP username
    $mail->Password   = PASS;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom(Email, 'RUi-Tech');
    $mail->addAddress($userEmail);     // Add a recipient               // Name is optional
    $mail->addReplyTo(Email, 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('../images/ruitech.png');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Your Password';
    $mail->Body    = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore the email.</p><br>
        <p>Here is your password reset link: <br>
        <a href = "' .$url.'"> '.$url.'</a></p>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();




	//  $to = $userEmail;

	// $subject = "Reset your password";

	// $message = "<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore the email.</p>";
	// $message .= "<p>Here is your password reset link: <br>";
	// $message .= '<a href = "' .$url.'"> '.$url.'</a></p>';

	// $headers = "From: RUi-Tech <dvjibra@gmail.com>\r\n";
	// $headers .= "Reply-To: dvjibra@gmail.com\r\n";
	// $headers .= "Content-type: text/html\r\n";

	// mail($to, $subject, $message, $headers);




header("Location: ../reset-password.php?reset=success");
 }
 catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}
//else{
// 	header("location: ../plot/index2.php");
// }
