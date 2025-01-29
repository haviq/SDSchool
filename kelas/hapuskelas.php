<?php
include '../koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the class record
    $query = "DELETE FROM kelas WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../datakelas.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: ../datakelas.php");
    exit();
}
?>
