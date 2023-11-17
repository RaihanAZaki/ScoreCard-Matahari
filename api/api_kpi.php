<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include "../modules/config.php";

$data = array();

$sql = "SELECT * FROM kpi INNER JOIN users ON users.id_divisi=kpi.id_divisi2";

// Eksekusi Query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    $data['error'] = 'Data tidak ditemukan';
}

// echo json_encode($data);

?>
