<?php
include '../koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM kelas WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $kelas = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kode_kelas = $_POST['kode_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];
    $tingkat = $_POST['tingkat'];
    $kapasitas = $_POST['kapasitas'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $status = $_POST['status'];

    $query = "UPDATE kelas SET 
              kode_kelas = '$kode_kelas',
              nama_kelas = '$nama_kelas',
              wali_kelas = '$wali_kelas',
              tingkat = '$tingkat',
              kapasitas = '$kapasitas',
              tahun_ajaran = '$tahun_ajaran',
              status = '$status'
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../datakelas.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas - School Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-link {
            color: white;
            padding: 15px 20px;
        }
        .nav-link:hover {
            background-color: #34495e;
            color: white;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center mb-4">School IS</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="daftarguru.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher me-2"></i> Guru
                </a>
            </li>
            <li class="nav-item">
                <a href="daftarsiswa.php" class="nav-link">
                    <i class="fas fa-user-graduate me-2"></i> Siswa
                </a>
            </li>
            <li class="nav-item">
                <a href="datakelas.php" class="nav-link active">
                    <i class="fas fa-school me-2"></i> Kelas
                </a>
            </li>
            <li class="nav-item">
                <a href="pelajaran.php" class="nav-link">
                    <i class="fas fa-book me-2"></i> Mata Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a href="jadwal.php" class="nav-link">
                    <i class="fas fa-calendar-alt me-2"></i> Jadwal
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content w-100">
        <nav class="navbar justify-content-end p-3">
            <a href="logout.php" class="btn btn-danger">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </nav>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Kelas</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $kelas['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Kode Kelas</label>
                            <input type="text" class="form-control" name="kode_kelas" value="<?php echo $kelas['kode_kelas']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wali Kelas</label>
                            <input type="text" class="form-control" name="wali_kelas" value="<?php echo $kelas['wali_kelas']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat</label>
                            <select class="form-control" name="tingkat" required>
                                <option value="10" <?php echo $kelas['tingkat'] == '10' ? 'selected' : ''; ?>>10</option>
                                <option value="11" <?php echo $kelas['tingkat'] == '11' ? 'selected' : ''; ?>>11</option>
                                <option value="12" <?php echo $kelas['tingkat'] == '12' ? 'selected' : ''; ?>>12</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kapasitas</label>
                            <input type="number" class="form-control" name="kapasitas" value="<?php echo $kelas['kapasitas']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo $kelas['tahun_ajaran']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Aktif" <?php echo $kelas['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                                <option value="Tidak Aktif" <?php echo $kelas['status'] == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="datakelas.php" class="btn btn-secondary">Kembali</a>
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
