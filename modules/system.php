<?php 
session_start();
include_once("config.php");

if (isset($_POST["login"])) {
    $email_user = $_POST["email_user"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email_user = '$email_user'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (md5($password) === $row["password"]) {
            // Verifikasi kata sandi berhasil, arahkan ke halaman yang sesuai
            $_SESSION['id_user'] = $row['id_user']; // Set session
            $_SESSION['role_user'] = $row['role_user'];

             // Tambahkan logika role-based untuk mengarahkan pengguna sesuai peran
             if ($row['role_user'] === 'superadmin') {
                header("Location: ../admin/superadmin.php");
            } elseif ($row['role_user'] === 'incumbent') {
                header("Location: ../pages/incumbents.php");
            } elseif ($row['role_user'] === 'supervisor') {
                header("Location: ../pages/supervisor.php");
            } else {
                header("Location: ../pages/login.php"); // Peran tidak dikenali
            }
            exit;
        } else {
            // Kata sandi tidak cocok, tampilkan pesan kesalahan
            echo "Kata sandi salah.";
        }
    } else {
        // Tidak ada hasil yang cocok, tampilkan pesan kesalahan
        echo "Tidak ada hasil yang cocok.";
    }
}

function Logout() {
    session_start();

    // Hapus semua data sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Redirect pengguna kembali ke halaman login atau halaman lain yang sesuai
    header("Location: ../pages/login.php");
    exit;
}

function Delete() {
    if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "DELETE FROM users WHERE id=$id";
        $query = mysqli_query($db, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            header('Location: ../admin/adm-user.php');
        } else {
            die("gagal menghapus...");
        }

    } else {
        die("akses dilarang...");
    }
    }
?>
