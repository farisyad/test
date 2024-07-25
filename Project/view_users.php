<?php 
session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require ('includes/login_functions.inc.php');
	redirect_user();	
}
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

$page_title = 'View the order list';
include ('test/header.html');
echo '<h1 id="viewuser">Order list</h1>';

require ('../mysqli_connect.php');
		
// Define the query:
$q = "SELECT occasion, event_date, event_time, budget, num_pax, location, contact_person,compname,contact_no,email, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, order_id FROM orders ORDER BY registration_date ASC";		
$r = @mysqli_query ($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p id=viewuser>There are currently $num orders.</p>\n";

	// Table header:
	
	echo '<table align="center" cellspacing="20">
	<tr id="tableheader">
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
		<td align="left"><b>Occasion</b></td>
		<td align="left"><b>Event date</b></td>
		<td align="left"><b>Event time</b></td>
		<td align="left"><b>Budget</b></td>
		<td align="left"><b>Number of pax</b></td>
		<td align="left"><b>Location</b></td>
		<td align="left"><b>Contact person</b></td>
		<td align="left"><b>Company name</b></td>
		<td align="left"><b>Contact no</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>Date Registered</b></td>
	</tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr id="tabledata">
			<td align="left"><a href="edit_user.php?id=' . $row['order_id'] . '">Edit</a></td>
			<td align="left"><a href="delete_user.php?id=' . $row['order_id'] . '">Delete</a></td>
			<td align="left">' . $row['occasion'] . '</td>
			<td align="left">' . $row['event_date'] . '</td>
			<td align="left">' . $row['event_time'] . '</td>
			<td align="left">' . $row['budget'] . '</td>
			<td align="left">' . $row['num_pax'] . '</td>
			<td align="left">' . $row['location'] . '</td>
			<td align="left">' . $row['contact_person'] . '</td>
			<td align="left">' . $row['compname'] . '</td>
			<td align="left">' . $row['contact_no'] . '</td>
			<td align="left">' . $row['email'] . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysqli_free_result ($r); // Free memory associated with $r	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered users.</p>';
}

mysqli_close($dbc); // Close database connection

include ('test/footer.html');
?>