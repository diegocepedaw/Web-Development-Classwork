<?php

	$pdo = new PDO("mysql:host=127.0.0.1", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		
	$dbconn = pg_connect("host=127.0.0.1 port=5432 dbname=lab10 user=root password=root");
		
		$sql ="SELECT * FROM `students` ORDER BY `lname`, `fname`";
		
		$results = $pdo->query($sql);
		  foreach ($results as $row) {
			  
				$rin = $row['rin']; 
				$rcsID = $row['rcsID']; 
				$fname = $row['fname'];
				$lname = $row['lname']; 
				$phone = $row['phone'];
				$street = $row['street'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
				$alias = $row['alias'];
					
				$query =" INSERT INTO students VALUES ($rin, $rcsID, $fname, $lname, $phone,$street, $city, $state, $zip, $alias )" ;
				$result = pg_query($dbconn, $query);
		  }  
	
	
		$sql ="SELECT * FROM `courses`";
		
		$results = $pdo->query($sql);
		  foreach ($results as $row) {
			  
				$crn = $row['crn']; 
				$prefix = $row['prefix']; 
				$number = $row['number'];
				$title = $row['title']; 
				$query =" INSERT INTO courses VALUES ($crn, $prefix, $number, $title)";
				$result = pg_query($dbconn, $query);
		  }
		  
		  
		$sql ="SELECT * FROM `greades`";
		
		$results = $pdo->query($sql);
		  foreach ($results as $row) {
			  
				$id = $row['id']; 
				$crn = $row['crn']; 
				$rin = $row['rin'];
				$grade = $row['grade']; 
				$query =" INSERT INTO grades VALUES ($id, $crn, $rin, $grade)";
				$result = pg_query($dbconn, $query);
		  }
	
		

		$query ="SELECT * FROM students";
		$results = $pdo->query($sql);
		  foreach ($results as $row) {
			 printf("<br>Student name:  %s, %s ", $row['lname'], $row['fname']);
		   
		  }
			
			
		
	
?>