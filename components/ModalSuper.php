<?php 
include_once("../api/api_kpi_user.php");

foreach($data as $row) {

?>

<div id="large-modal<?php echo $row['id_kpi_user']; ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-gray-900">
                    Update KPI
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal<?php echo $row['id_kpi_user']; ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <input class="p-2 border-2 rounded-md w-full" type="text" value="<?php echo $row['nama_user']; ?>" disabled>
                    </div>
                    <div>
                        <input class="p-2 border-2 rounded-md w-full" type="text" value="<?php echo $row['divisi_user']; ?>" disabled>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <div>
                        <input class="p-2 border-2 rounded-md w-full" type="text" value="<?php echo $row['nama_kpi']; ?>" disabled>
                    </div>
                    <div>
                        <input class="p-2 border-2 rounded-md w-full" type="text" value="<?php echo $row['kategori_kpi']; ?>" disabled>
                    </div>
                    <div>
                        <input class="p-2 border-2 rounded-md w-full" type="text" value="<?php echo $row['stage']; ?>" disabled>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <textarea class="p-2 border-2 rounded-md w-full h-48" type="text" id="textarea1" disabled><?php echo $row['deskripsi_kpi']; ?></textarea>
                    </div>
                    <div>
                        <textarea class="p-2 border-2 rounded-md w-full h-48" type="text" id="textarea2" disabled><?php echo $row['objective_kpi']; ?></textarea>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b">
                <button data-modal-hide="large-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="large-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>