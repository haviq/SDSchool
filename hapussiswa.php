<?php
include 'koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM siswa WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: daftarsiswa.php");
        exit();
    }
}
?>
