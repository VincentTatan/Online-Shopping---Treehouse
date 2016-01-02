<?php

require_once("../include/config.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]);
	
	if($name == "" OR $email == "" OR $message == ""){
		$error_message = "You must specify a value for name, email address, and message.";
	}

	if(!isset($error_message)){
		foreach($_POST as $value){
			if(stripos($value,'Content-Type:') !== FALSE){
				$error_message ="There was a problem with the information you entered";
			}
		}
	}

	if (!isset($error_message) AND $_POST["address"]!= ""){
		$error_message = "Your form submission has an error.";
	}

	require_once(ROOTPATH."include/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	if (!isset($error_message)){
		if(!$mail ->ValidateAddress($email)){
			$error_message = "You must specify a valid email address";
		}
	}

	if(!isset ($error_message)){

		$email_body = "";
		$email_body = $email_body."Name: ". $name."\n";
		$email_body = $email_body."Email: ".$email."\n";
		$email_body = $email_body."message: ".$message;

		$mail->SetFrom($email,$name);

	// $mail->AddReplyTo($email,$name);
		$address = "vincentt.2013@sis.smu.edu.sg";
		$mail->AddAddress($address, "Vincent Tatan");

		$mail->Subject    = "Shirts 4 Mike Contact Form Submission | ". $name;

	// $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($email_body);

	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	}
	if(!isset($error_message)){
		if($mail->Send()){
			header("Location: ".BASE_URL."contact/?status=thanks");
			exit;
		} else {
			$error_message = "There was a problem sending the email: " . $mail->ErrorInfo;
		}
	}

}

$pageTitle ="Contact Mike";
$section = "contact";

include(ROOT_PATH.'include/header.php');
?>

<div class="section page">
	<div class="wrapper">
		<h1>Contact</h1>
		<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
		<p>Thank you for the email! I&rsquo;ll be in touch with you soon</p>
		<?php } else { ?>

		<?php

		if (!isset($error_message)){
			echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';
		} else {
			echo '<p class ="message">'.$error_message.'</p>';
		}
		?>
		<form method="post" action=BASE_PATH."contact.php">
			<table>
				<tr>
					<th>
						<label for ="name">Name</label>
					</th>
					<td>

						<input type="text" name="name" id="name" value="<?php if (isset($name)){echo htmlspecialchars($name);}?>">
					</td>
				</tr>
				<tr>
					<th>
						<label for ="email">Email</label>
					</th>
					<td>

						<input type="text" name="email" id="email" value="<?php if (isset($email)){echo htmlspecialchars($email);}?>">
					</td>
				</tr>
				<tr>
					<th>
						<label for ="message">Message</label>
					</th>
					<td>
						<textarea name="message" id="message"><?php if (isset($message)){echo htmlspecialchars($message);}?></textarea>
					</td>
				</tr>
				<tr style="display:none;">
					<th>
						<label for ="address">Address</label>
					</th>
					<td>
						<textarea name="address" id="address"></textarea>
						<p>Please leave this field blank</p>
					</td>
				</tr>
			</table>
			<input type="submit" value="Send">
		</form>
		<?php } ?>
	</div>
</div>

<?php include(ROOT_PATH.'include/footer.php');?>