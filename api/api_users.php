<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Hubungkan ke database
include "../modules/config.php";

// Inisialisasi array untuk menyimpan data berita
$data = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql = "SELECT * FROM users INNER JOIN divisi ON divisi.id=users.id_divisi INNER JOIN kpi_user ON kpi_user.id_user=users.id_user;";

// Eksekusi Query
$result = mysqli_query($conn, $sql);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    // Jika data tidak ditemukan, kirim respon JSON dengan pesan error
    $data['error'] = 'Data tidak ditemukan';
}

// // Tampilkan data dalam format JSON
// echo json_encode($data);

// Tutup koneksi database
// mysqli_close($conn);

?>

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Hubungkan ke database
include "../modules/config.php";

// Inisialisasi array untuk menyimpan data berita
$data2 = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql2 = "SELECT * FROM users";

// Eksekusi Query
$result2 = mysqli_query($conn, $sql2);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data2[] = $row2;
    }
} else {
    // Jika data tidak ditemukan, kirim respon JSON dengan pesan error
    $data2['error'] = 'Data tidak ditemukan';
}

// // Tampilkan data dalam format JSON
// echo json_encode($data2);

// Tutup koneksi database
// mysqli_close($conn);

?>