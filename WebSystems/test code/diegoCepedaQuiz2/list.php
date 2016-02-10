<!doctype html>
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
		
		
     <title>Lab 4 AJAX</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="diegoCepedaLab4css.css">
	
  </head>
  <body >
	
	<form method="post" >
			<label > Delete Song by title </label><input type="text" name="titleDelete" required><br>
			<input type="submit" name="submit" value="deleteSong" />
	</form>
	<script> onClick()</script>
    <a id="site" href="#" onclick="onClick()"><img id="coverart" src="noalbum.png" />Click to load songs</a>
    <table id="playlist">
			<tr>
				<td><h2>Song</h2></td>
				<td><h2>Artist</h2> </td>
				<td><h2>Album</h2></td>
				<td><h2>Release Date</h2></td>
				<td><h2>Genre</h2></td>
				<td><h2>Website</h2></td>
				<td><h2>Cover</h2></td>
				
			</tr>
			
		</table>
  </body>
	<script src="diegoCepedaLab4.js"> </script>
	 
</html>
