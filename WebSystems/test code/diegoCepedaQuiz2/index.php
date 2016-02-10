<?php
	session_start();
  if (isset($_SESSION["username"]))
   {
      header("location: login.php");
   }

?>



<!DOCTYPE HTML>
<html>

<head>
  <title>Websys</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script src="script.js"></script>
  
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1>Web Systems Quiz 2</h1>
		  <h2>ITWS 2110 / CSCI 4961</h2>
        </div>
      </div>
 
    </div>
	
	<div id="menuDiv">
		<ul id="menu">
	
			<li><a href="addUser.php">Add User</a></li>
			<li>
				<a href="login.php">Log In</a>
			</li>
			<li><a href="list.php">Music list</a>
			</li>
			<li><a href="enterSong.php">Enter Song</a>
			</li>
			<li><a href="index.php">Landing page</a>
			</li>
			<li><a onClick="history.go(-1);return true;">Go Back</a>
			</li>
			
		</ul>
	</div>
		
    <div id="site_content">
    
      <div id="content">
	 
			<!-- insert the page content here -->
			<h1>Please log in by clicking on the menu above</h1>			
		   
      </div>
    </div>
  </div>
</body>
</html>
