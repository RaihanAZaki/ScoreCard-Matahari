<?php
// include_once('../modules/system.php');
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role_user'] !== 'incumbent') {
    header('Location: login.php'); // Redirect ke halaman lain yang sesuai
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include ("../routes/Link.php") 
    ?>
</head>
<body>
    <?php 
        include_once("../components/NavBar.php");
    ?>
    <form action="../modules/tambah_kpi.php" method="POST">
    <div class="grid grid-cols-10">
        <div class="col-span-1"></div>
        <div class="col-span-8 mt-8 p-2">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-2xl font-bold">Daftar KPI</h1>
                    <ol class="flex items-center whitespace-nowrap min-w-0 pt-4 mb-4">
                    <li class="text-sm">
                        <a href="incumbents.php">
                            Dashboard
                        </a>
                    </li>
                    <div class="justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 mx-2 justify-center w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                    <li class="text-sm font-semibold">
                        <a href="#">
                            Daftar KPI
                        </a>
                    </li>
                    </ol>
                </div>
                <div class="flex mt-4">
                <button type="submit" class="rounded-md border-2 p-2 h-11 w-24 mr-2" name="save_button">Save</button>
                <div class="rounded-md border-2 p-2 w-24 h-11 text-center"><a href="setting.php">Add New</a></div>
                </div>
            </div>


            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="operating-tab" data-tabs-target="#operating" type="button" role="tab" aria-controls="operating" aria-selected="false">Operating Measurement</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="financial-tab" data-tabs-target="#fincancial" type="button" role="tab" aria-controls="financial" aria-selected="false">Fincancial Measurement</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="flex justify-center" id="operating" role="tabpanel" aria-labelledby="operating-tab">
                    <div class="grid grid-cols-3 p-2 gap-8">
                        <?php 
                        include ("../api/api_kpi.php");
                        $id_user_login = $_SESSION['id_user'];
                        foreach($data as $row) {
                            if ($row['id_user'] == $id_user_login) {
                                if ($row['kategori_kpi'] === "Operating" && $row['id_divisi'] === $row['id_divisi2']) {
                        ?>

                                <div class="col-span-1">
                                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                                        <div class="flex items-center"> <!-- Added "items-center" class to align items vertically -->
                                            <input type="checkbox" name="selected_kpi[]" value="<?php echo $row['id_kpi']; ?>" class="h-4 w-4 mr-4">
                                            <a href="#">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $row['nama_kpi']; ?></h5>
                                            </a>
                                        </div>

                                        
                                        <div class="mb-3 font-normal text-gray-500 line-clamp-2"><?php echo $row['deskripsi_kpi']; ?></div>
                                        <a href="#" data-modal-target="extralarge-modal<?php echo $row['id_kpi']; ?>" data-modal-toggle="extralarge-modal<?php echo $row['id_kpi']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#B91C1C] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Read more
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        <?php 
                            } }
                        }
                        ?>
                    </div>
                </div>
                  
                <div class="flex justify-center" id="fincancial" role="tabpanel" aria-labelledby="fincancial-tab">
                    <div class="grid grid-cols-3 p-2 gap-8">
                        <?php 
                        include ("../api/api_kpi.php");
                        $id_user_login = $_SESSION['id_user'];
                        foreach($data as $row) {
                            if ($row['id_user'] == $id_user_login) {
                            if ($row['kategori_kpi'] === "Financial" && $row['id_divisi'] === $row['id_divisi2']) {
                        ?>

                                <div class="col-span-1">
                                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                                        <div class="flex items-center"> <!-- Added "items-center" class to align items vertically -->
                                            <input type="checkbox" name="selected_kpi[]" value="<?php echo $row['id_kpi']; ?>" class="h-4 w-4 mr-4">
                                            <a href="#">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $row['nama_kpi']; ?></h5>
                                            </a>
                                        </div>

                                        <div class="mb-3 font-normal text-gray-500 line-clamp-2" id="descriptionText"><?php echo $row['deskripsi_kpi']; ?></div>
                                        
                                        <a href="#" data-modal-target="extralarge-modal<?php echo $row['id_kpi']; ?>" data-modal-toggle="extralarge-modal<?php echo $row['id_kpi']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#B91C1C] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Read more
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        <?php 
                            } }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-span-1"></div>
    </div>

    <?php 
    include("../components/ModalDetail.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    
</body>

</html>