<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Send email via Gmail SMTP server in PHP</title>
		<link href="style1.css" rel="stylesheet" type="text/css"/>
		<link href="C:/xampp/htdocs/project files/PHPMailer-master/src/PHPMailer.php">
		<meta name="robots" content="noindex, nofollow">
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-43981329-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	<body>
		<div id="main">
			<h1>Send email via Gmail SMTP server in PHP</h1>
			<div id="login">
				<h2>Gmail SMTP</h2>
			<hr/>
				<form action="index.php" method="post">
					<input type="text" placeholder="Enter your email ID" name="email"/>
					<input type="password" placeholder="Password" name="password"/>
					<input type="text" placeholder="To : Email Id " name="toid"/>
					<input type="text" placeholder="Subject : " name="subject"/>
					<textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
					<input type="submit" value="Send" name="send"/>
				</form>
			</div>
		</div>
		<?php
			session_start();
			require './phpmailer/PHPMailerAutoload.php';
			require_once('./phpmailer/class.phpmailer.php');
			include("./phpmailer/class.smtp.php");
			if(isset($_POST['send']))
			{
				$mail = new PHPMailer();
				$mail ->IsSmtp();
				$mail ->SMTPDebug = 0;
				$mail ->SMTPAuth = true;
				$mail ->SMTPSecure = 'ssl';
				$mail ->Host = 'smtp.gmail.com';
				$mail ->Port = 465; // or use 587
				$email1 = "stepinhershoes1331@gmail.com";//"stepinhershoes1331@gmail.com";
				$mail ->Username = "stepinhershoes1331@gmail.com";//"codeintegrate1999@gmail.com";
				$mail ->Password = "naari2019";//"code@123";
				$mail ->SetFrom("stepinhershoes1331@gmail.com");
				$to_id = $_SESSION["email"];;
				$mail ->AddAddress($to_id);				
				$subject = "Checking for bug fix....";
				$message = "Dear $to_id,
           						Welcome to our events..
            					Contact him at $email1 for further details.
            				";
				$mail ->Subject = $subject;
				$mail ->Body = $message;
				if (!$mail->send()) {
					$error = "Mailer Error: " . $mail->ErrorInfo;
					echo '<p id="para">'.$error.'</p>';
				}
				else {
					echo '<p id="para">Message sent!</p>';
				}
			}
			else{
				echo '<p id="para">Please enter valid data</p>';
			}
		?>
	</body>
</html>
