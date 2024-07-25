<?php 
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require ('test/login_functions.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('test/header.html');

// Print a customized message:

echo "<h1 id=message>Logged In!</h1>
<p id=message>You are now logged in, {$_SESSION['first_name']}!</p>";
//<p><a href=\"logout.php\">Logout</a></p>";

include ('test/footer.html');
?>