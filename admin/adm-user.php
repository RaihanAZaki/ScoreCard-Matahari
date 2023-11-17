<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
                            <h1 class="text-3xl font-bold mb-5">User Page</h1>
                            <button class="flex border-2 p-2 mb-5 rounded-md text-white font-medium bg-[#B52544] hover:bg-red-500"   data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                New Data
                            </button>
                            <div class="p-4 border rounded-md">
                                
                                <table id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th>Kode User</th>
                                            <th>Nama User</th>
                                            <th>Email</th>
                                            <th>Role User</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include ('../api/api_users.php');
                                        
                                            foreach ($data2 as $row) {
                                                echo "
                                                <tr>
                                                <td class='text-center'>".$row['kode_user']."</td>
                                                <td class='text-center'>". $row['nama_user']."</td>
                                                <td class='text-center'>". $row['email_user']."</td>
                                                <td class='text-center'>". $row['role_user']."</td>
                                                <td class='flex items-center text-center justify-center'>
                                                    <a href='#'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 text-gray-500'>
                                                            <path stroke-linecap='round' stroke-linejoin='round' d='M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10' />
                                                        </svg>
                                                    </a>
                                                    <a href='delete.php?id=$row[id_user]'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 text-gray-500'>
                                                            <path stroke-linecap='round' stroke-linejoin='round' d='M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0' />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>";
                                            }
                                        ?>
                                    </tbody>
                                    
                                    <script>
                                    $(document).ready(function(){
                                        $('#tabel-data').DataTable();
                                    });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        // Get form data
        $kode_user = $_POST['kode_user'];
        $nama_user = $_POST['nama_user'];
        $email_user = $_POST['email_user'];
        $id_divisi = $_POST['id_divisi'];
        $role_user = $_POST['role_user'];

        // Include database connection file
        include_once "../modules/config.php";

        // Check the database connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Insert user data into table using prepared statements
        $query = "INSERT INTO users (kode_user, nama_user, email_user, id_divisi, role_user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssis", $kode_user, $nama_user, $email_user, $id_divisi, $role_user);

        if ($stmt->execute()) {
            // Insertion successful
            echo "Data inserted successfully!";
        } else {
            // Display error message if query execution fails
            echo "Error: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $mysqli->close();
    }
    ?>

    <!-- drawer component -->
    <div id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-2/6" tabindex="-1" aria-labelledby="drawer-right-label">
            <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500"><svg class="w-4 h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>Insert New User</h5>
        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <form action="adm-user.php" method="POST">
            <div class="space-y-4">
                <div class="grid grid-cols-2 flex gap-2">
                    <div>
                        <label for="kode_user" class="block mb-2 text-sm font-medium text-gray-900">Kode User</label>
                        <input type="text" name="kode_user" id="kode_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type user code" required="">
                    </div>
                    <div>
                        <label for="nama_user" class="block mb-2 text-sm font-medium text-gray-900">Nama User</label>
                        <input type="text" name="nama_user" id="nama_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type user name" required="">
                    </div> 
                </div>
               
                <div>
                    <label for="email_user" class="block mb-2 text-sm font-medium text-gray-900">Email_user</label>
                    <input type="email" name="email_user" id="email_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="mppa@hypermart.co.id" required="">
                </div>
                <div>
                    <label for="id_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi User</label>
                    <select id="id_divisi" name="id_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                    <option selected="">Select category</option>
                    <?php 
                    include('../api/api_divisi.php');

                    foreach ($data as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['divisi_user'] . ' - ' . $row['title_user']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div>
                <label for="role_user" class="block mb-2 text-sm font-medium text-gray-900">Role User</label>
                    <select id="role_user" name="role_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                        <option selected="">Select category</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="incumbent">Incumbents</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="executive">Executive</option>
                    </select>
                </div>
                <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                    <button type="submit" name="Submit" class="text-black w-full justify-center border-2 border-[#E0134C] hover:bg-[#E0134C] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:text-white">
                        Add product
                    </button>
                    <button type="button" data-drawer-dismiss="drawer-right-example" aria-controls="drawer-right-example" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Cancel
                    </button>
                </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
