<?php
include '../koneksi/config.php';

// Get teacher data by ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM guru WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $guru = mysqli_fetch_assoc($result);
}

// Handle form submission
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = "UPDATE guru SET 
              nip = '$nip',
              nama_guru = '$nama_guru',
              mata_pelajaran = '$mata_pelajaran',
              jenis_kelamin = '$jenis_kelamin',
              alamat = '$alamat',
              no_telepon = '$no_telepon'
              WHERE id = $id";
    
    if(mysqli_query($conn, $query)) {
        header('Location: ../daftarguru.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru - School Information System</title>
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
                    <a href="../daftarguru.php" class="nav-link active">
                        <i class="fas fa-chalkboard-teacher me-2"></i> Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../daftarsiswa.php" class="nav-link">
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
                    <h2>Edit Data Guru</h2>
                    <div>
                        <span class="me-3">Welcome, Admin</span>
                        <a href="logout.php" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>

                <!-- Form Edit Guru -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Edit Guru</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $guru['id']; ?>">
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $guru['nip']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $guru['nama_guru']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?php echo $guru['mata_pelajaran']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" <?php echo ($guru['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php echo ($guru['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $guru['alamat']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $guru['no_telepon']; ?>" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                                <a href="daftarguru.php" class="btn btn-secondary">Kembali</a>
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
