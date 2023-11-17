<?php
// include_once('../modules/system.php');
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role_user'] !== 'supervisor') {
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
    <?php include("../routes/link.php") ?>
</head>
<body>
   <div class="grid grid-cols-10 gap-3">
        <div class="col-span-3 h-screen border-r-4 p-4">
        <h1 class="font-bold text-2xl mb-3">Data KPI</h1>
           <div class="grid grid-cols-3 gap-4  h-36 mb-14">
            <?php 
            include('../api/api_kpi_user.php');
            
            // Inisialisasi variabel total
            $totalSubmit = 0;
            $totalApprove = 0;
            $totalPending = 0;

            foreach ($data as $row) {
                if ($row['id_divisi'] === $row['id']) {
                    if ($row['stage'] === 'Submit') {
                        $totalSubmit++;
                    } elseif ($row['stage'] === 'Approve') {
                        $totalApprove++;
                    } elseif ($row['stage'] === 'Pending') {
                        $totalPending++;
                    }
                }
            }
            ?>
                <div class="rounded-md border-2 p-3 shadow">
                    <div class="flex items-center justify-center mb-2">
                        <div class="w-20 h-20 rounded-full border-2 border-blue-900 flex items-center justify-center">
                            <h1 class="text-black text-2xl font-bold"><?php echo $totalSubmit; ?></h1>
                        </div>
                    </div>
                    <h1 class="text-md font-medium text-center">Total</h1>
                    <h1 class="text-md font-medium text-center">Submit</h1>
                </div>
                <div class="rounded-md border-2 p-3 shadow">
                    <div class="flex items-center justify-center mb-2">
                        <div class="w-20 h-20 rounded-full border-2 border-blue-900 flex items-center justify-center">
                            <h1 class="text-black text-2xl font-bold"><?php echo $totalApprove; ?></h1>
                        </div>
                    </div>
                    <h1 class="text-md font-medium text-center">Total</h1>
                    <h1 class="text-md font-medium text-center">Approve</h1>
                </div>
                <div class="rounded-md border-2 p-3 shadow">
                    <div class="flex items-center justify-center mb-2">
                        <div class="w-20 h-20 rounded-full border-2 border-blue-900 flex items-center justify-center">
                            <h1 class="text-black text-2xl font-bold"><?php echo $totalPending; ?></h1>
                        </div>
                    </div>
                    <h1 class="text-md font-medium text-center">Total</h1>
                    <h1 class="text-md font-medium text-center">Pending</h1>
                </div>
           </div>
            <div class="mb-14">
                <h1 class="font-bold text-2xl mb-3">Analisis KPI</h1>
                <div>
                    <div class="rounded-md border-2 shadow">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-md border-2 shadow p-4 text-center">
                    <h1 class="font-bold text-xl">Tambah Data</h1>
                </div>
                <div class="rounded-md border-2 shadow p-4 text-center">
                    <h1 class="font-bold text-xl">Daftar KPI</h1>
                </div>
            </div>
        </div>
        <div class="col-span-7 h-full">
            <div class="h-screen p-4">
                <h1 class="text-2xl font-bold mb-5">Tabel Data KPI</h1>
                <div class="flex justify-between mb-5">
                    <div class="flex">
                        <div class="border-2 p-2 rounded-md w-28 mr-3">
                            <select name="" id="tahapanFilter">
                                <option value="">Tahapan</option>
                                <option value="submit">Submit</option>
                                <option value="approve">Approve</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="border-2 p-2 rounded-md w-28">
                            <select name="" id="kategoriFilter">
                                <option value="">Kategori</option>
                                <option value="Operating">Operating</option>
                                <option value="Financial">Financial</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 p-2 rounded-md">
                            <button type="button" class="w-20" onclick="filterData()">Filter</button>
                        </div>
                    </div>
                </div>

                <div class="border-2 rounded-sm px-3">
                    <table class="table-auto mt-4 mb-4">
                        <thead>
                            <tr class="border-b text-center font-bold text-sm w-full">
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3 w-48">Nama User</th>
                                <th class="px-6 py-3 w-80">Posisi User</th>
                                <th class="px-6 py-3 w-96">Nama KPI</th>
                                <th class="px-6 py-3 w-56">Kategori KPI</th>
                                <th class="px-6 py-3 w-56">Status KPI</th>
                                <th class="px-6 py-3 w-24">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include_once("../api/api_kpi_user.php");
                        $id_user_login = $_SESSION['id_user'];

                        foreach ($data as $row) { 
                                if ($row['id_divisi'] === $row['id_divisi']) {
                            ?>
                            <tr class="border-t text-center text-sm w-full" data-tahapan="<?php echo strtolower($row['stage']); ?>" data-kategori="<?php echo strtolower($row['kategori_kpi']); ?>">
                                <td class="px-6 py-3 w-14"><?php echo $row['id_kpi_user']; ?></td>
                                <td class="px-6 py-3 w-48"><?php echo $row['nama_user']; ?></td>
                                <td class="px-6 py-3 w-96"><?php echo $row['divisi_user']; ?></td>
                                <td class="px-6 py-3 w-96"><?php echo $row['nama_kpi']; ?></td>
                                <td class="px-6 py-3 w-56"><?php echo $row['kategori_kpi']; ?></td>
                                <td class="px-6 py-3 w-96"><?php echo $row['stage']; ?></td>
                                <td  class="px-6 py-3 w-24 text-right">
                                <div class="flex text-right items-end justify-end">
                                    <button type="button" data-modal-target="large-modal<?php echo $row['id_kpi_user']; ?>" data-modal-toggle="large-modal<?php echo $row['id_kpi_user']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 text-center">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                        </svg>
                                    </button>
                                </div>
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>

   <?php include_once("../components/ModalSuper.php")?>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    function filterData() {
    var tahapanFilter = document.getElementById('tahapanFilter').value.toLowerCase();
    var kategoriFilter = document.getElementById('kategoriFilter').value.toLowerCase();

    console.log('tahapanFilter:', tahapanFilter);
    console.log('kategoriFilter:', kategoriFilter);

    var rows = document.querySelectorAll('.table-auto tbody tr');

    rows.forEach(function (row) {
        var tahapan = row.getAttribute('data-tahapan').toLowerCase();
        var kategori = row.getAttribute('data-kategori').toLowerCase();

        console.log('tahapan:', tahapan);
        console.log('kategori:', kategori);

        var isTahapanMatch = tahapanFilter === '' || tahapan === tahapanFilter;
        var isKategoriMatch = kategoriFilter === '' || kategori === kategoriFilter;

        // Tampilkan atau sembunyikan baris sesuai dengan hasil filter
        row.style.display = isTahapanMatch && isKategoriMatch ? '' : 'none';
    });
    }
    </script>

   <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Submit', 'Approve', 'Pending'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3],
        backgroundColor: ['#3498db', '#2ecc71', '#e74c3c'],
        borderWidth: 6
      }]
    },
    options: {
      maintainAspectRatio: false,
      animation: {
        animateRotate: true, // Menambahkan animasi rotasi
        animateScale: false, // Setel ke false jika tidak ingin animasi scaling
      },
      aspectRatio: 1,
      plugins: {
        legend: {
          position: 'bottom', // Menentukan posisi legend
        },
      },// Sesuaikan dengan kebutuhan Anda
      scales: {
        y: {
          display: false, // Menghilangkan angka pada sumbu Y
        }
      },
      elements: {
        arc: {
          borderWidth: 0
        }
      },
      radius: '90%',
      cutout: '80%',
    }
  });
</script>

</body>
</html>