<?php

	$pdo = new PDO("mysql:host=127.0.0.1", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->query("use `'lab9'`");
	
	if(isset($_POST['grades']))
	{
		$sql =  "SELECT COUNT(*)  FROM `grades` WHERE `grade` <= 100 AND `grade` >= 90 ";
		$results = $pdo->query($sql);
		$count = $results->fetchColumn();
		printf("<br>Grade Distribution<br>90-100: %d", $count);
		
		$sql =  "SELECT COUNT(*)  FROM `grades` WHERE `grade` <= 89 AND `grade` >= 80 ";
		$results = $pdo->query($sql);
		$count = $results->fetchColumn();
		printf("<br>80-89: %d", $count);
		
		$sql =  "SELECT COUNT(*)  FROM `grades` WHERE `grade` <= 79 AND `grade` >= 70 ";
		$results = $pdo->query($sql);
		$count = $results->fetchColumn();
		printf("<br>70-79: %d", $count);
		
		$sql =  "SELECT COUNT(*)  FROM `grades` WHERE `grade` <= 69 AND `grade` >= 65 ";
		$results = $pdo->query($sql);
		$count = $results->fetchColumn();
		printf("<br>65-69: %d", $count);
		
		$sql =  "SELECT COUNT(*)  FROM `grades` WHERE `grade` < 65 ";
		$results = $pdo->query($sql);
		$count = $results->fetchColumn();
		printf("<br><65: %d", $count);
			
		
	}
	else
	{
		
		$sql ="
		SELECT * FROM `students` ORDER BY `lname`, `fname`
		";
		
		$pdo->query($sql);
		
		 $results = $pdo->query($sql);
		  foreach ($results as $row) {
			 printf("<br>Student name:  %s, %s ", $row['lname'], $row['fname']);
		   
		  }
			
	}
	
	
	
	
	
?>