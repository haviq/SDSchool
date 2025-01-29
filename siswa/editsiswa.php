<?php
include '../koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM siswa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $siswa = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    
    $query = "UPDATE siswa SET 
              nis = '$nis',
              nama_siswa = '$nama_siswa', 
              kelas = '$kelas',
              jenis_kelamin = '$jenis_kelamin',
              alamat = '$alamat'
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../daftarsiswa.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - School Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        #sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: white;
            width: 250px;
        }
        .nav-link {
            color: white;
            padding: 15px;
        }
        .nav-link:hover {
            background: #34495e;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .active {
            background: #34495e;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar" class="position-fixed">
            <h3 class="p-3 mb-3 border-bottom">School IS</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="../dashboard.php" class="nav-link">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../daftarguru.php" class="nav-link">
                        <i class="fas fa-chalkboard-teacher me-2"></i> Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../daftarsiswa.php" class="nav-link active">
                        <i class="fas fa-user-graduate me-2"></i> Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../datakelas.php" class="nav-link">
                        <i class="fas fa-school me-2"></i> Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pelajaran.php" class="nav-link">
                        <i class="fas fa-book me-2"></i> Mata Pelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../jadwal.php" class="nav-link">
                        <i class="fas fa-calendar-alt me-2"></i> Jadwal
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content w-100">
            <div class="container">
                <!-- Header with Logout -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Edit Data Siswa</h2>
                    <div>
                        <span class="me-3">Welcome, Admin</span>
                        <a href="logout.php" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>

                <!-- Form Edit Siswa -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Edit Siswa</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $siswa['nis']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $siswa['nama_siswa']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $siswa['kelas']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" <?php echo ($siswa['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php echo ($siswa['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $siswa['alamat']; ?></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                                <a href="../daftarsiswa.php" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
