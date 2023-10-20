<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'web';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['studentname'], $_POST['parentname'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill all fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT adminNo, password FROM formone WHERE parentname = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['parentname']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($adminNo, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
if ($_POST['password'] === $password) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['parentname'];
		$_SESSION['id'] = $adminNo;
		header('Location: home.php');
	} else {
		// Incorrect password
		echo '<!DOCTYPE html>
<html>
  <head>
    <title>Error</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="loginstyle.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Tumaini Senior Secondary School</h1>
        <p>We do the best to ensure you be updated on your students well-being at school.</p>
      </div>
      <form>
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Error</h2>
        </div>
        <div class="info">
        Incorrect Password!
        </div><br><br>
        <div style="font-size: 30px; text-align: center;"><a href="login.php">Back</a></div>
      </form>
    </div>
  </body>
  </html>';
	}
} else {
	// Incorrect parentname
	echo '<!DOCTYPE html>
<html>
  <head>
    <title>Error</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="loginstyle.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Tumaini Senior Secondary School</h1>
        <p>We do the best to ensure you be updated on your students well-being at school.</p>
      </div>
      <form>
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Error</h2>
        </div>
        <div class="info">
        Incorrect Parent name!
        </div>
        <div style="font-size: 30px; text-align: center;"><a href="login.php">Back</a></div>
      </form>
    </div>
  </body>
  </html>';
}

	$stmt->close();
}
?>