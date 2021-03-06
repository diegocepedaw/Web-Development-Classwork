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


// Check login
if (isset($_POST['login']) && $_POST['login'] == 'Login') {
  $salt_stmt = $dbconn->prepare('SELECT salt FROM users_auth WHERE username=:username');
  $salt_stmt->execute(array(':username' => $_POST['username']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res['salt'] : '';
  $salted = hash('sha256', $salt . $_POST['pass']);
  
  $login_stmt = $dbconn->prepare('SELECT username, uid, is_admin FROM users_auth WHERE username=:username AND pass=:pass');
  $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
  
  
  if ($user = $login_stmt->fetch()) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['uid'] = $user['uid'];
    $_SESSION['is_admin'] = $user['is_admin'];


    // check admin
    // $is_admin = $dbconn->prepare('SELECT * FROM users_auth WHERE username=:username AND is_admin=1');
    // $is_admin->execute(array(':username'=> $_SESSION['username']));

// echo "<pre>";
// print_r($_SESSION);
// echo "<br/>";
// print_r($user);
// echo "<br/>";

// echo (($user['is_admin']==true) ? "admin" : "user");

// echo "</pre>";
// exit();


    if ($user['is_admin']==true) {
      header('Location: addUser.php');
      exit();
    }
  } else {
    $err = 'Incorrect username or password.';
  }
}








// Logout
if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
  // Unset the keys from the superglobal
  unset($_SESSION['username']);
  unset($_SESSION['uid']);
  // Destroy the session cookie for this session
  setcookie(session_name(), '', time() - 72000);
  // Destroy the session data store
  session_destroy();
  $err = 'You have been logged out.';
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
		
		
  <title>Login</title>
</head>
<body>
  <?php if (isset($_SESSION['username'])): ?>
  <h1>Welcome, <?php echo htmlentities($_SESSION['username']) ?></h1>
  <form method="post" action="login.php">
    <input name="logout" type="submit" value="Logout" />
  </form>
  <?php else: ?>
  <h1>Login</h1>
  <?php if (isset($err)) echo "<p>$err</p>" ?>
  <form method="post" action="login.php">
    <label for="username">Username: </label><input type="text" name="username" />
    <label for="pass">Password: </label><input type="password" name="pass" />
    <input name="login" type="submit" value="Login" />
  </form>
  <?php endif; ?>
</body>
</html>
