<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting KPI</title>
    <?php include_once("../routes/Link.php") ?>
</head>
<body>
    
    <?php include_once("../components/NavBar.php");?>
    <div class="row">
        <div class="grid grid-cols-10">
            <div class="col-span-1"></div>
            <div class="col-span-8 mt-8 rounded border border-2 p-6">
                <table id="example" class="display" style="width:100%">
                    <thead class="">
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-left">Position</th>
                            <th class="text-left">Nama KPI</th>
                            <th class="text-left">Kategori KPI</th>
                            <th class="text-left">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    include_once("../api/api_kpi_user.php");
                    $id_user_login = $_SESSION['id_user'];

                    foreach ($data as $row) { 
                        if ($row['id_user'] === $id_user_login) {
                            ?>
                            <tr>
                                <td><?php echo $row['nama_user']; ?></td>
                                <td><?php echo $row['divisi_user']; ?></td>
                                <td><?php echo $row['nama_kpi']; ?></td>
                                <td><?php echo $row['kategori_kpi']; ?></td>
                                <td><a href="setting.php">Setting KPI</a></td>
                                <!-- <td>2011-04-25</td>
                                <td>$320,800</td> -->
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>
</body>
</html>l