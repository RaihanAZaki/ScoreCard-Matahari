<?php
// include database connection file
include("../modules/config.php");
  
if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM users WHERE id_user=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: superadmin.php');
    } else {
        die("gagal menghapus...");
    }

    } else {
        die("akses dilarang...");
    }

?>