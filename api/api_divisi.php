<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include "../modules/config.php";

$data = array();

$sql = "SELECT * FROM divisi";

// Eksekusi Query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    $data['error'] = 'Data tidak ditemukan';
}

echo json_encode($data);

?>
