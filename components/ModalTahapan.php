<?php
    include_once("../api/api_kpi_user.php"); // Gantilah dengan nama file API pengguna yang sesuai

    // Membuat array asosiatif untuk menyimpan data pengguna yang digroupkan berdasarkan 'divisi_user'
    $groupedData = array();

    foreach ($data as $user) {
        // Menentukan kunci grup berdasarkan 'divisi_user'
        $groupKey = $user['divisi_user'];

        // Jika kunci grup belum ada, inisialisasi array kosong
        if (!isset($groupedData[$groupKey])) {
            $groupedData[$groupKey] = array(
                'divisi_user' => $user['divisi_user'],
                'users' => array() // Inisialisasi array untuk pengguna dengan 'divisi_user' yang sama
            );
        }

        // Menambahkan data pengguna ke dalam grup yang sesuai
        $groupedData[$groupKey]['users'][] = $user;
    }

    foreach ($groupedData as $group) {
    ?>
<div id="extralarge-modals<?php echo $group['divisi_user']; ?>" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden overflow-y-auto">
    <div class="relative w-full min-h-screen">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow m-4">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-gray-900">
                    <?php
                    // Mengakses informasi divisi dari grup data
                    echo $group['divisi_user'];
                    ?>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover-text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="extralarge-modals<?php echo $group['divisi_user']; ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="w-full overflow-x-hidden overflow-y-auto max-h-[calc(100vh-150px)]">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark-border-neutral-500">
                            <tr>
                                <th scope="col" class="px-10 py-4">ID</th>
                                <th scope "col" class="px-3 py-4 text-center">Nama</th>
                                <th scope="col" class="px-3 py-4 text-center">Stage</th>
                                <th scope="col" class="px-3 py-4 text-center">Divisi</th>
                                <th scope="col" class="px-3 py-4 text-center">Title</th>
                                <th scope="col" class="px-3 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Menampilkan informasi pengguna dari grup data
                            foreach ($group['users'] as $userData) {
                            ?>
                            <tr class="border-b dark-border-neutral-500">
                                <td class="whitespace-nowrap px-10 py-4 font-medium text-xs hover-text-[#E0134C]"><?php echo $userData['id_user']; ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover-text-[#E0134C]"><?php echo $userData['nama_user']; ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover-text-[#E0134C]"><?php echo $userData['stage']; ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover-text-[#E0134C]"><?php echo $userData['divisi_user']; ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover-text-[#E0134C]"><?php echo $userData['title_user']; ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-center font-medium hover-text-[#E0134C]">
                                    <div class="flex items-center justify-center">
                                    <a href="#" data-modal-hide="extralarge-modals<?php echo $group['divisi_user']; ?>" data-modal-target="modal-user<?php echo $userData['id_user']; ?>" data-modal-toggle="modal-user<?php echo $userData['id_user']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <!-- ... (Tombol aksi) -->
        </div>
    </div>
</div>

<?php
}
?>

<?php 
include_once("ModalView.php")
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalLinks = document.querySelectorAll('[data-modal-toggle]');

        modalLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                const targetModalId = this.getAttribute('data-modal-target');
                const targetModal = document.getElementById(targetModalId);

                if (targetModal) {
                    targetModal.classList.toggle('hidden'); // Assuming you have a 'hidden' class for hiding the modal
                }
            });
        });
    });
</script>
