<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='icon' href="../MPPA.png">
</head>
<body>
    <div class="row">
        <div class="grid grid-cols-12">
            <div class="col-span-1">
                <?php 
                include("../components/SideBar.php")
                ?>
            </div>
            <div class="col-span-11 p-3 bg-gray-100">
                <div class="border-dashed border-2 rounded h-full overflow-y-auto bg-white max-h-[730px]">
                    <!-- Bagian Utama -->
                    <div class="flex justify-center mt-10">
                        <div class="w-full md:w-11/12">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-7">
                            <?php 
                            include('../api/api_kpi_user.php');
                            
                            // Inisialisasi variabel total
                            $totalSubmit = 0;
                            $totalApprove = 0;
                            $totalPending = 0;

                            foreach ($data as $row) {
                                if ($row['stage'] === 'Submit') {
                                    $totalSubmit++;
                                } elseif ($row['stage'] === 'Approve') {
                                    $totalApprove++;
                                } elseif ($row['stage'] === 'Pending') {
                                    $totalPending++;
                                }
                            }
                            ?>

                            <div class="col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow justify-between">
                                <div class="grid grid-cols-4 ">
                                    <div class="col-span-3">
                                        <h1 class="font-bold text-xl">Total Submit</h1>
                                        <h1 class="font-bold text-4xl text-[#E0134C]"><?php echo $totalSubmit; ?><span class="text-lg">Karyawan</span></h1>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="flex aligns-center justify-center text-center items-center w-20 h-20 rounded-full bg-[#3e8ede]">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                <div class="grid grid-cols-4">
                                    <div class="col-span-3">
                                        <h1 class="font-bold text-xl">Total Approve</h1>
                                        <h1 class="font-bold text-4xl text-[#E0134C]"><?php echo $totalApprove; ?><span class="text-lg">Karyawan</span></h1>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="flex aligns-center justify-center text-center items-center w-20 h-20 rounded-full bg-[#9bca47]">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow">
                            <div class="grid grid-cols-4 ">
                                    <div class="col-span-3">
                                        <h1 class="font-bold text-xl">Total Pending</h1>
                                        <h1 class="font-bold text-4xl text-[#E0134C]"><?php echo $totalPending; ?><span class="text-lg">Karyawan</span></h1>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="flex aligns-center justify-center text-center items-center w-20 h-20 rounded-full bg-[#E0134C]">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                    <h1 class="font-bold text-2xl mb-5">Tahapan KPI</h1>
                                    <div class="w-full">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500 text-left">
                                                <tr>
                                                <th scope="col" class="px-10 py-4">Departement</th>
                                                <th scope="col" class="px-3 py-4">Submitted</th>
                                                <th scope="col" class="px-3 py-4">Supervisor</th>
                                                <th scope="col" class="px-3 py-4">Executive</th>
                                                <th scope="col" class="px-3 py-4">Approve</th>
                                                <th scope="col" class="px-3 py-4">Pending</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once("../api/api_users.php");
                                                $existingDivisions = [];
                                                $stageCountsByDivision = [];

                                                foreach ($data as $row) {
                                                    $division = $row['divisi_user'];
                                                    $stage = $row['stage'];
                                                    
                                                    // Cek apakah divisi sudah ada
                                                    if (!in_array($division, $existingDivisions)) {
                                                        $existingDivisions[] = $division;
                                                        $stageCountsByDivision[$division] = [
                                                            'Submit' => 0,
                                                            'Supervisor' => 0,
                                                            'Executive' => 0,
                                                            'Approve' => 0,
                                                            'Pending' => 0,
                                                        ];
                                                    }
                                                    
                                                    $stageCountsByDivision[$division][$stage]++;
                                                }

                                                foreach ($stageCountsByDivision as $division => $counts) {
                                                ?>
                                                <tr class="border-b dark:border-neutral-500">
                                                    <td class="whitespace-nowrap px-10 py-4 font-medium text-xs hover:text-[#E0134C]">
                                                        <a href="#" data-modal-target="extralarge-modals<?php echo $division; ?>" 
                                                        data-modal-toggle="extralarge-modals<?php echo $division; ?>">
                                                            <?php echo $division; ?>
                                                        </a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-10 py-4 font-medium text-xs hover:text-[#E0134C]">
                                                        <a href="#" data-modal-target="extralarge-submits<?php echo $group['divisi_user']; ?>" 
                                                        data-modal-toggle="extralarge-submits<?php echo $group['divisi_user']; ?>">
                                                        <?php echo $counts['Submit']; ?>
                                                        </a>
                                                    </td>
                                                    <!-- <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover:text-[#E0134C]"><?php echo $counts['Submit']; ?></td> -->
                                                    <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover:text-[#E0134C]"><?php echo $counts['Supervisor']; ?></td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium  hover:text-[#E0134C]"><?php echo $counts['Executive']; ?></td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover:text-[#E0134C]"><?php echo $counts['Approve']; ?></td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover:text-[#E0134C]"><?php echo $counts['Pending']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                    <h1 class="font-bold text-2xl mb-5">List Departement</h1>  
                                   

                                    <ul>
                                        <?php
                                        include_once("../api/api_kpi_user.php");
                                        $printedDivisions = [];

                                        foreach ($data as $row) {
                                            $division = $row['divisi_user'];

                                            // Periksa apakah divisi ini sudah dicetak sebelumnya
                                            if (!in_array($division, $printedDivisions)) {
                                                echo "<div class='flex '>                                  
                                                            <button data-modal-target='extralarge-modal" . $row['divisi_user'] . "' data-modal-toggle='extralarge-modal" . $row['divisi_user'] . "'type='button'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5 mr-3 mb-1 cursor-pointer transition-all text-[#E0134C] hover:text-[#f20749]'>
                                                                    <path stroke-linecap='round' stroke-linejoin='round' d='M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z' />
                                                                </svg>
                                                            </button>
                                                            <li class='truncate text-md mb-2 '>$division</li>
                                                    </div>";
                                                $printedDivisions[] = $division; // Tandai divisi ini sebagai sudah dicetak
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include('../components/ModalList.php');
    include('../components/ModalTahapan.php');
    ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
