<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("../routes/Link.php"); ?>
</head>
<body>
<?php include_once("../components/NavBar.php"); ?>
    <div class="grid grid-cols-10 grid-flow-col gap-4 mt-8">
        <div class="col-span-1"></div>
        <div class="col-span-8 p-2">
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
                <li class="text-sm font-medium">
                    <a href="#">
                        Tabel KPI
                    </a>
                </li>
            </ol>
            <div class="border-2 rounded-sm px-3">
                <table class="table-auto mt-4 mb-4">
                    <thead>
                        <tr class="border-b text-center font-bold text-sm w-full">
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3 w-48">Nama User</th>
                            <th class="px-6 py-3 w-80">Posisi User</th>
                            <th class="px-6 py-3 w-96">Nama KPI</th>
                            <th class="px-6 py-3 w-56">Kategori KPI</th>
                            <th class="px-6 py-3 w-24">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../api/api_kpi_user.php");
                        $id_user_login = $_SESSION['id_user'];

                        foreach ($data as $row) { 
                            if ($row['id_user'] === $id_user_login) {
                                ?>
                                <tr class="border-t text-center text-sm w-full">
                                    <td class="px-6 py-3 w-14"><?php echo $row['id_kpi_user']; ?></td>
                                    <td class="px-6 py-3 w-48"><?php echo $row['nama_user']; ?></td>
                                    <td class="px-6 py-3 w-96"><?php echo $row['divisi_user']; ?></td>
                                    <td class="px-6 py-3 w-96"><?php echo $row['nama_kpi']; ?></td>
                                    <td class="px-6 py-3 w-56"><?php echo $row['kategori_kpi']; ?></td>
                                    <td  class="px-6 py-3 w-24 text-right">
                                        <div class="flex text-right items-end justify-end">
                                            <button type="button" data-modal-target="medium-modal" data-modal-toggle="medium-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                                </svg>
                                            </button>
                                            <a href="delete.php?id_kpi_user=<?php echo $row['id_kpi_user']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1"></div>
    </div>

    <!-- Default Modal -->
    <div id="medium-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-medium text-gray-900">
                        Setting KPI 
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="../modules/edit.php" method="POST">
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="grid grid-cols-2">
                            <div class="col-span-1">
                                <p class="text-base leading-relaxed text-black">Result</p>
                                <input type="text" name="results" class="border-2 my-1 border-black p-2 rounded-lg" placeholder="Result">
                            </div>
                            <div class="col-span-1">
                                <p class="text-base leading-relaxed text-black">Target</p>
                                <input type="text" name="target" class="border-2 my-1 border-black p-2 rounded-lg" placeholder="Target">
                            </div>
                        </div>
                        <div>
                        <p class="text-base leading-relaxed text-black mb-1">Output</p>
                        <textarea type="text" name="output" class="my-1 border-2 p-2 rounded-lg" placeholder="Output"></textarea>
                        </div>
                        <div>
                        <p class="text-base leading-relaxed text-black">Score</p>
                        <input type="text" name="score" class="w-full border-2 border-black p-2 rounded-lg" placeholder="Result">
                        </div>
                    </div>
                
                
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button class="border-2 rounded-md p-2 w-24 hover:bg-red-700 hover:text-white" value="save" name="save">Save</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/rpezenrpky2iuyg1rskkwvdal7ac3v8xba5mjchyfywx3eeu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</body>
</html>