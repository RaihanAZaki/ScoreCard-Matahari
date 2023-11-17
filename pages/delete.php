<?php
// include database connection file
include_once("../modules/config.php");

// Get id from URL to delete that user
$id = $_GET['id_kpi_user'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM kpi_user WHERE id_kpi_user=$id");

// Check for errors during the delete operation
if (!$result) {
    die("Error: " . mysqli_error($mysqli));
}

// After delete redirect to Home, so that the latest user list will be displayed.
header("Location: Tabel.php");
?>
