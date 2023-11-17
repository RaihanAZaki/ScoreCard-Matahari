<?php
include_once("config.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data (sanitize and validate as needed)
    $nama_kpi = mysqli_real_escape_string($conn, $_POST['nama_kpi']);
    $id_divisi2 = mysqli_real_escape_string($conn, $_POST['id_divisi2']);
    $kategori_kpi = mysqli_real_escape_string($conn, $_POST['kategori_kpi']);
    $objective_kpi = mysqli_real_escape_string($conn, $_POST['objective_kpi']);
    $deskripsi_kpi = mysqli_real_escape_string($conn, $_POST['deskripsi_kpi']);

    // Create your SQL insert query
    $insertQuery = "INSERT INTO kpi (nama_kpi, id_divisi2, kategori_kpi, objective_kpi, deskripsi_kpi) 
                    VALUES ('$nama_kpi', '$id_divisi2', '$kategori_kpi', '$objective_kpi', '$deskripsi_kpi')";

    // Execute the query
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
