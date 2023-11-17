<?php
    include_once("../api/api_kpi_user.php");

    foreach ($data as $userData) {

    ?>
    <div id="modal-user<?php echo $userData['id_user']; ?>" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden overflow-y-auto">
        <div class="relative w-full min-h-screen">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow m-4">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-medium text-gray-900">
                    <?php
                    // Mengakses informasi divisi dari grup data
                    echo $userData['nama_user'];
                    ?>  
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover-text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="modal-user<?php echo $userData['id_user']; ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1 border-2 rounded-sm p-4">
                            <h1 class="text-xl font-bold mb-1">Personal Information</h1>
                            <div class="border-t mb-4"></div>
                            <div>
                                <ul class="list-disc p-4">
                                    <li class="mb-2"><?php echo $userData['nama_user']; ?></li>
                                    <li class="mb-2"><?php echo $userData['email_user']; ?></li>
                                    <li class="mb-2"><?php echo $userData['divisi_user']; ?></li>
                                    <li class="mb-2"><?php echo $userData['title_user']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-span-1 border-2 rounded-sm p-4 overflow-scroll-y max-h-[400px]">
                            <h1 class="text-xl font-bold mb-1">Key Performace Indicator</h1>
                            <div class="border-t mb-4"></div>
                            <?php
                            foreach ($data as $userData) {
                            ?>
                            <div class="border-2 rounded-md p-2">
                                <h1 class="text-xl font-medium mb-2">KPI 1</h1>
                                <ul class="list-disc px-4">
                                    <li class="mb-2"><?php echo $userData['nama_kpi']; ?></li>
                                    <li class="mb-2"><?php echo $userData['kategori_kpi']; ?></li>
                                    <li class="mb-2"><?php echo $userData['objective_kpi']; ?></li>
                                    <li class="mb-2"><?php echo $userData['deskripsi_kpi']; ?></li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>

    
