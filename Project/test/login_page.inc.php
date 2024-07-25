<?php 
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';
include ('test/header.html');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1 class="error">Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p class="error">Please try again.</p>';
}

// Display the form:
?><h1 class="login">Login</h1>
<form id="login" action="login.php" method="post" >
	<p>Email Address: <br><input type="text" name="email" size="20" maxlength="60" /> </p>
	<p>Password: <br><input type="password" name="pass" size="20" maxlength="20" /></p>
	<p><input type="submit" id="loginbtn" name="submit" value="Login" /></p>
</form>

<?php include ('test/footer.html'); ?>