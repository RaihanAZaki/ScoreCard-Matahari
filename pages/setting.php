<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
include_once ("../api/api_kpi_user.php");
foreach($data as $kpi) {

$tabs1 = [
    'Insert Data' => 
    '  
        ',
        ];
    }

$currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'Insert Data';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting KPI</title>
    <?php include_once("../routes/Link.php"); ?>
</head>
<body>
<?php include_once("../components/NavBar.php"); ?>
    <div class="row">
        <div class="grid grid-cols-10 grid-flow-col gap-4 mt-8">
            <div class="col-span-1"></div>
            <div class="col-span-2 border border-2 rounded-md p-5 max-h-[200px]">
                <?php 
                foreach ($tabs1 as $tab => $content) {
                    $isActive = ($currentTab === $tab) ? 'active' : '';
                    echo '
                    <div class="text-lg font-medium text-white text-center bg-red-700 rounded-md p-2">
                        <button class=""' . $isActive . '"><a href="?tab=' . $tab . '">' . $tab . '</a></button>
                    </div>';
                }
                ?>
              
                <a class="mt-1 flex text-sm items-right float-right no-underline hover:underline" href="how.php">Baca Panduan
                    <span class="ml-1 text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </span>
                </a>
            </div>
            <div class="col-span-6 border border-2 rounded-lg p-6 overflow-y-auto max-h-[630px]">
                <div id="kolomKanan" >
                    <div id="insert">
                        <div class="flex justify-between"> 
                            <h1 class="font-medium text-2xl mb-3">INSERT KPI</h1>
                        </div>
                        <?php 
                        include_once("../api/api_kpi.php");
                        $id_user_login = $_SESSION['id_user'];
                        $id_user_role = $_SESSION['role_user'];
                        ?>
                        <form action="../modules/tambahKPI.php" method="POST" role="form">
                            <div class="flex grid grid-cols-3 mb-5 gap-4">
                                <div>
                                    <p class="mb-1">Nama KPI</p>
                                    <input type="text" class="p-2 border rounded border-1 border-red-700 w-full" name="nama_kpi"/>
                                </div>  
                                <div>
                                    <p class="mb-1">Departement KPI</p>
                                    <select name="id_divisi2" id="kategori_kpi" class="p-2 border rounded border-1 border-red-700 w-full">
                                        <option value="">Select Option...</option>
                                        <?php 
                                            include("../api/api_divisi.php");
                                            foreach($data as $row) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['divisi_user']; ?> - <?php echo $row['title_user']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>   
                                <div>
                                    <p class="mb-1">Kategori KPI</p>
                                    <select name="kategori_kpi" id="kategori_kpi" class="p-2 border rounded border-1 border-red-700 w-full">
                                        <option value="">Select Option...</option>
                                        <option value="Operating">Operating</option>
                                        <option value="Financial">Financial</option>
                                    </select>
                                </div>   
                            </div> 
                            <div class="grid grid-cols-2 mb-11 gap-4">
                                <div class="col-span-1 w-full">
                                    <p class="mb-1">Objective KPI</p>
                                    <textarea class="w-full h-80 border-red-700" id="myeditorinstance<?php echo $kpi['id']; ?>" name="objective_kpi"></textarea>
                                </div>       
                                <div class="col-span-1 w-full h-full">
                                    <p class="mb-1">Deskripsi KPI</p>
                                    <textarea class="w-full h-80 border-red-700" id="myeditorinstance<?php echo $kpi['id']; ?>" name="deskripsi_kpi"></textarea>
                                </div>  
                            </div> 
                            <button class="border-2 rounded-md p-2 w-24 hover:bg-red-700 hover:text-white">Save</button> 
                        </form>
                    </div>
                </div>
                <div id="kolomKanan" >
                    <?php 
                        echo '<div class="content">' . $tabs2[$daftarTab] . '</div>';
                    ?>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/rpezenrpky2iuyg1rskkwvdal7ac3v8xba5mjchyfywx3eeu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <script>
        function ChecKPI(val) {
            var element = document.getElementriById('kpi_change');
            if (val == 'pick a color' || val == 'nama_kpi')
                element.style.display = 'block';
            else
                element.style.display = 'none';

            }
    </script>
</body>
</html>