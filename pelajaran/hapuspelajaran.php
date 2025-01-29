<?php
include '../koneksi/config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM pelajaran WHERE id = $id";
    
    if(mysqli_query($conn, $query)) {
        header("Location: ../pelajaran.php");
        exit();
    }
}
?>
