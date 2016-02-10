<?php

	$pdo = new PDO("mysql:host=127.0.0.1", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->query("use `'lab9'`");
	
	$sql ="
		INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `year`) VALUES
		(1111, '1111', 1111, 'class', 1111),
		(2222, '2222', 2222, 'class2', 2222),
		(3333, '3333', 3333, 'class3', 3333),
		(5555, '5555', 5555, 'class5', 5555),
		(4444, '4444', 4444, 'class4', 4444);
	
		INSERT INTO `students` (`rin`, `street`, `city`, `state`, `zip`, `rcsid`, `fname`, `lname`, `alias`, `phone`) VALUES
		(444, 'street4', 'city4', 'state4', 4444, '4444', 'student4', 'las4', '4444', 4444),
		(1111, 'street1', 'city1', 'state1', 1111, '1111', 'samename', 'las1', '1111', 1111),
		(2222, 'street2', 'city2', 'state2', 2222, '2222', 'samename', 'las2', '2222', 2222),
		(4444, 'street4', 'city4', 'state4', 4444, '4444', 'student4', 'las4', '4444', 4444),
		(5555, 'street5', 'city5', 'state5', 5555, '5555', 'student5', 'las5', '5555', 5555),
		(6666, 'street6', 'city6', 'state6', 6666, '6666', 'student6', 'las6', '6666', 6666),
		(7777, 'street7', 'city7', 'state7', 7777, '7777', 'student7', 'las7', '7777', 7777),
		(8888, 'street8', 'city8', 'state8', 8888, '8888', 'student8', 'las8', '8888', 8888),
		(9999, 'street9', 'city9', 'state9', 9999, '9999', 'student9', 'las9', '9999', 9999),
		(1000, 'street10', 'city10', 'state10', 1000, '1000', 'student10', 'las10', '1000', 1000),
		(1222, 'street12', 'city12', 'state12', 1222, '1222', 'student12', 'las12', '1222', 1222),
		(1333, 'street13', 'city13', 'state13', 1333, '1333', 'student13', 'las13', '1333', 1333),
		(1444, 'street14', 'city14', 'state14', 1444, '1444', 'student14', 'las14', '1444', 1444),
		(1555, 'street15', 'city15', 'state15', 1555, '1555', 'student15', 'las15', '1555', 1555),
		(1666, 'street16', 'city16', 'state16', 1666, '1666', 'student16', 'las16', '1666', 1666),
		(1777, 'street17', 'city17', 'state17', 1777, '1777', 'student17', 'las17', '1777', 1777),
		(1888, 'street18', 'city18', 'state18', 1888, '1888', 'student18', 'las18', '1888', 1888),
		(1999, 'street19', 'city19', 'state19', 1999, '1999', 'student19', 'las19', '1999', 1999),
		(2999, 'street29', 'city29', 'state29', 2999, '2999', 'student29', 'las29', '2999', 2999),
		(3333, 'street3', 'city3', 'state3', 3333, '3333', 'student3', 'las3', '3333', 3333);
		
		
		INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
		(1, 1111, 444, 100),
		(2, 1111, 2222, 100),
		(3, 1111, 3333, 99),
		(4, 2222, 4444, 88),
		(5, 2222, 5555, 78),
		(6, 2222, 6666, 78),
		(7, 2222, 7777, 68),
		(8, 2222, 8888, 58),
		(9, 2222, 9999, 77),
		(10, 2222, 1222, 90),
		(11, 2222, 1333, 44);
	
	";
	
	$pdo->query($sql);
	
?>