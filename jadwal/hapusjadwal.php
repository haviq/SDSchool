<?php
include '../koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM jadwal WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../jadwal.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
