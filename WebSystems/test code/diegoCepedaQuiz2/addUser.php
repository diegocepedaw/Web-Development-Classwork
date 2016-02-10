<?php
  session_start();
  
  // Connect to the database
  try {
    $dbname = 'CEPEDD-ITWS2110-F15-Quiz2';
    $user = 'root';
    $pass = '';
    $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
  }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
  
// vaidate admin
    // $is_admin = $dbconn->prepare('SELECT is_admin FROM users_auth WHERE username=:username AND is_admin=1');   
    // $is_admin->execute(array(':username' => $_SESSION['username']));
    // $user = $is_admin->fetch();
    if (isset($_POST['quit']) && $_POST['quit']=='Quit') {
      header('Location: login.php');
      exit();
    }



    if ($_SESSION['is_admin'] != true) {
      header('Location: login.php');
      exit();
    } else {

      if (isset($_POST['register']) && $_POST['register'] == 'Register') {
        
        // @TODO: Check to see if duplicate usernames exist
        
        if (!isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['passconfirm']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['passconfirm'])) {
          $msg = "Please fill in all form fields.";
        }
        else if ($_POST['pass'] !== $_POST['passconfirm']) {
          $msg = "Passwords must match.";
        }
        else {
          // Generate random salt
          $salt = hash('sha256', uniqid(mt_rand(), true));      

          // Apply salt before hashing
          $salted = hash('sha256', $salt . $_POST['pass']);
   	  
          $is_admin = ($_POST['isadmin'] == "true" ? true : false);

          // Store the salt with the password, so we can apply it again and check the result
          $stmt = $dbconn->prepare("INSERT INTO users_auth (username, pass, salt, is_admin) 
                              VALUES (:username, :pass, :salt, :isadmin)");
          $stmt->execute(array(':username' => $_POST['username'], 
                               ':pass' => $salted, 
                               ':salt' => $salt,
                               ':isadmin'=> $is_admin
                                ));
          $msg = "Account created.";
        }
      } 
    }
?>
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
		
		
  <h1>User Registration</h1>
  <?php if (isset($msg)) echo "<p>$msg</p>" ?>
  <form method="post" action="addUser.php">
    <label for="username">Username: </label><input type="text" name="username" />
    <label for="pass">Password: </label><input type="password" name="pass" />
    <label for="passconfirm">Confirm: </label><input type="password" name="passconfirm" />
    <label for="setadmin">Admin?: </label><input type="radio" name="isadmin" value="true" />Yes
                                          <input type="radio" name="isadmin" value="false" />No
    <input type="submit" name="register" value="Register" />

  <form method="post" action="login.php">
    <input name="quit" type="submit" value="Quit" />
  </form>


  </form>
</body>
</html>
