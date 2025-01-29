<?php
include '../koneksi/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_pelajaran = $_POST['kode_pelajaran'];
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $kelas = $_POST['kelas'];
    $semester = $_POST['semester'];
    $jam_pelajaran = $_POST['jam_pelajaran'];
    $guru_pengajar = $_POST['guru_pengajar'];

    $query = "INSERT INTO pelajaran (kode_pelajaran, nama_pelajaran, kelas, semester, jam_pelajaran, guru_pengajar) 
              VALUES ('$kode_pelajaran', '$nama_pelajaran', '$kelas', '$semester', '$jam_pelajaran', '$guru_pengajar')";
    
    if(mysqli_query($conn, $query)) {
        header("Location: ../pelajaran.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelajaran - School Information System</title>
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
                    <a href="datakelas.php" class="nav-link">
                        <i class="fas fa-school me-2"></i> Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pelajaran.php" class="nav-link active">
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Tambah Pelajaran</h2>
                            <div>
                                <span class="me-3">Welcome, Admin</span>
                                <a href="logout.php" class="btn btn-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Form Tambah Pelajaran</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Pelajaran</label>
                                        <input type="text" class="form-control" name="kode_pelajaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pelajaran</label>
                                        <input type="text" class="form-control" name="nama_pelajaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <input type="text" class="form-control" name="kelas" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                        <input type="text" class="form-control" name="semester" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jam Pelajaran</label>
                                        <input type="text" class="form-control" name="jam_pelajaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Guru Pengajar</label>
                                        <input type="text" class="form-control" name="guru_pengajar" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="pelajaran.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
