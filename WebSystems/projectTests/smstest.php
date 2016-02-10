<html>
	<form action="" method="post" >
       <label for="phoneNumber">Phone Number
       <input type="text" name="phoneNumber" id="phoneNumber" placeholder="ex: 3855550168" required pattern="^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$"/>
        </label>

   </form>
</html>


<?php //this sends out an sms to the phone number

	if (isset($_POST["phoneNumber"]))
	{
		
		
		require 'PHPMailer/PHPMailerAutoload.php';
	
	
		$number = $_POST["phoneNumber"];
		$soberD = "4444444444"; // should be loaded from database by a query
			
	
		//using carriers email to sms clients because it's the only free alternative to sms gateways
		$email = $number ."@vtext.com";
		$name = "Party Guest";
		sendMail($email, $name, $soberD);
		
		$email = $number ."@txt.att.net";
		$name = "Party Guest";
		sendMail($email, $name, $soberD);
		
		$email = $number ."@tmomail.net";
		$name = "Party Guest";
		sendMail($email, $name, $soberD);
		
		$email = $number ."@sprintpcs.com";
		$name = "Party Guest";
		sendMail($email, $name, $soberD);
		
		
	}
	
	function sendMail($email, $name, $soberD){
			
			$mail = new PHPMailer(true);

			//Set up gmail smtp
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPAuth = true; // enable SMTP authentication
			$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
			$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
			$mail->Port = 465; // set the SMTP port for the GMAIL server
			$mail->Username = "websysgroup8@gmail.com"; // GMAIL username
			$mail->Password = "richardplotkarpi"; // GMAIL password
			
		
			//create message
			$email_from = "websysgroup8@gmail.com"; 
			$name_from = "PartyLog";
			//Typical mail data
			$mail->AddAddress($email, $name);
			$mail->SetFrom($email_from, $name_from);
			$mail->Subject = "Partylog notification";
			$mail->Body = "The sober driver number for this party is: ". $soberD;

			try{
				$mail->Send();
				echo "Success!";
			} catch(Exception $e){
				//Something went bad
				echo "Fail :(";
			}

		}


?>