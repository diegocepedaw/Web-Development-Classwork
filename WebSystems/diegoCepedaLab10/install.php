<?php

	$dbconn = pg_connect("host=127.0.0.1 port=5432 dbname=lab10 user=root password=root");
	
	$query ="
	
		CREATE TABLE IF NOT EXISTS `courses` (
		  `crn` int(11) NOT NULL,
		  `prefix` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
		  `number` smallint(4) NOT NULL,
		  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `year` int(4) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


		CREATE TABLE IF NOT EXISTS `grades` (
		`id` int(11) NOT NULL,
		  `crn` int(11) NOT NULL,
		  `rin` int(11) NOT NULL,
		  `grade` int(11) NOT NULL
		) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

		CREATE TABLE IF NOT EXISTS `students` (
		  `rin` int(9) NOT NULL,
		  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `zip` int(5) NOT NULL,
		  `rcsid` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `phone` int(10) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	";
	
	$result = pg_query($dbconn, $query);
	 
	 if (!$result) {
		echo "An error occurred.\n";
		exit;
	 }
	
	echo "SUCCESS!";

?>