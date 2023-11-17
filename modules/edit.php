<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['save']))
{	
	$results = $_POST['results'];
	$target=$_POST['target'];
	$output=$_POST['output'];
	$score=$_POST['score'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE kpi_user SET results='$results',target='$target',output='$output',score='$score'");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>