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
    <title>Incumbent Page</title>
    <?php
    include ("../routes/Link.php") 
    ?>
</head>
<body class="">
    <?php 
    include_once("../components/NavBar.php");
    ?>

    <div class="row">
        <!-- CAROUSEL -->
        <div class= "grid grid-cols-10 grid-flow-col gap-2">
            <div class="col-span-1"></div>
            <div class="col-span-8 p-4">
                <div class="border-2 h-full rounded-md py-5 px-3">
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-48 overflow-hidden rounded-lg md:h-80">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="../assets/img/lku.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
        <div class="grid grid-cols-10 grid-flow-col gap-2">
            <div class="col-span-1"></div>
            <div class="col-span-6 h-100 p-4">
                <div class="border-2 h-full rounded-md py-5 px-3">
                    <h1 class="text-2xl font-bold mb-1">Key Performance Indicator Status</h1>
                    <div class="border-b-2 mb-5"></div>
                </div>
                
            </div>
            
            <div class="col-span-2 p-4">
                <div class="border-2 h-full rounded-md"></div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>
</body>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</html>