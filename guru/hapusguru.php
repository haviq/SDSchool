<?php
include '../koneksi/config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete query
    $query = "DELETE FROM guru WHERE id = $id";
    
    if(mysqli_query($conn, $query)) {
        header('Location: ../daftarguru.php');
        exit();
    }
}
?>
