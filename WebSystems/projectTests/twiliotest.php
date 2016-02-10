<html>
<body>

</body>
</html>

<?php 
	  
	  require "twilio-twilio-php-f83a9f8/Services/Twilio.php";
     
      // set your AccountSid and AuthToken from www.twilio.com/user/account
      $sid = "AC02807de8e3d508ec5086b92c225970e0";
      $token = "082cc14a487761e6fcf8ca7692d78024";
	  
      $http = new Services_Twilio_TinyHttp(
			'https://api.twilio.com',
			array('curlopts' => array(
				CURLOPT_SSL_VERIFYPEER => true,
				CURLOPT_SSL_VERIFYHOST => 2,
			))
		);

	  $client = new Services_Twilio($sid, $token, "2010-04-01", $http);
		  
	  $message = $client->account->messages->create(array(
      "From" => "+12062587748",
      "To" => "+18587509496",
      "Body" => "New Subscriber"
      ));
	  
/*
      $message = fopen("latest.txt","r");
      $message = fread($message,filesize("latest.txt"));
      $marr = $message;
    
     
      $message = $client->account->messages->create(array(
      "From" => "+16195682093",
      "To" => $to,
      "Body" => "Latest Wiki News: " . $marr,
      ));
   */

?>