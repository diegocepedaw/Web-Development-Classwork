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
		
		 <form method="post" action="enterSong.php">
			<label for="title"> Title: </label><input type="text" name="title" required><br>
			<label> Artist: </label><input type="text" name="artist" required><br>
			<label> Album: </label><input type="text" name="album" required><br>
			<label> Release Year: </label><input type="text" name="year" required><br>
			<label> Genre: </label><input type="text" name="genre" required><br>
			<label> Website url: </label><input type="text" name="website" required><br>
			<label> Cover url: </label><input type="text" name="cover" required><br>
			
			<input type="submit" name="submit" value="addSong" />
		  </form>
	</body>
</html>

<?php
	 try {
    $dbname = 'CEPEDD-ITWS2110-F15-Quiz2';
    $user = 'root';
    $pass = '';
    $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
  }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
	
	if(isset($_POST['cover']) || !isset($_POST['title']) || !isset($_POST['artist']) || !isset($_POST['album']) || !isset($_POST['year']) || !isset($_POST['genre']) || !isset($_POST['website']) )
	{
		$stmt = "INSERT INTO song_list (title, artist, album, year, genre, website, cover) VALUES ($_POST[title], $_POST[artist], $_POST[album], $_POST[year], $_POST[genre], $_POST[website], $_POST[cover])";
        if($dbconn->execute($stmt))
			{echo "Query was successful";}
		else
			{echo "Query was unsuccesful";}
		
		
	}

?>