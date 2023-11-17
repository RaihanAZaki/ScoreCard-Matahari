<?php
// Sambungkan ke database
include_once("config.php");

// Periksa apakah tombol Save diklik
if (isset($_POST['save_button'])) {
    // Tangkap data checkbox yang dipilih
    $selectedKPIs = $_POST['selected_kpi'];

    // Sisipkan data ke dalam database
    foreach ($selectedKPIs as $kpiId) {
        // Lakukan query SQL sesuai dengan struktur tabel kamu
        $query = "INSERT INTO kpi_user (id_user, id_kpi, stage) VALUES ('$kpiId', '$_SESSION[id_user], 'Submit'')";
        // Eksekusi query
        mysqli_query($koneksi, $query);
    }

    // Tutup koneksi ke database jika diperlukan
    mysqli_close($koneksi);
    
    // Redirect atau tampilkan pesan berhasil jika diperlukan
    header("Location: setting.php?success=1");
    exit();
}
?>
