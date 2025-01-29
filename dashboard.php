<?php
include 'koneksi/config.php';

// Fetch counts from each table
$teacherCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM guru"))['count'];
$siswaCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM siswa"))['count'];
$kelasCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM kelas"))['count'];
$pelajaranCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM pelajaran"))['count'];
$jwlcount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM jadwal"))['count'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School Information System</title>
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
        .dashboard-card {
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    
    <div class="d-flex">
        <!-- Sidebar - Same as before -->
        <div id="sidebar" class="position-fixed">
        <div id="sidebar" class="position-fixed">
    <h3 class="p-3 mb-3 border-bottom">School IS</h3>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
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

        </div>

        <!-- Main Content -->
        <div class="content w-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Dashboard Sistem Informasi Sekolah</h2>
                            <div>
                                <span class="me-3">Welcome, Admin</span>
                                <a href="logout.php" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Teachers Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card dashboard-card bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Total Guru</h6>
                                                <h2 class="mb-0"><?php echo $teacherCount; ?></h2>
                                            </div>
                                            <i class="fas fa-chalkboard-teacher fa-3x opacity-50"></i>
                                        </div>
                                        <a href="teachers.php" class="text-white text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Students Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card dashboard-card bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Total Siswa</h6>
                                                <h2 class="mb-0"><?php echo $siswaCount; ?></h2>
                                            </div>
                                            <i class="fas fa-user-graduate fa-3x opacity-50"></i>
                                        </div>
                                        <a href="students.php" class="text-white text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Classes Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card dashboard-card bg-warning text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Total Kelas</h6>
                                                <h2 class="mb-0"><?php echo $kelasCount; ?></h2>
                                            </div>
                                            <i class="fas fa-school fa-3x opacity-50"></i>
                                        </div>
                                        <a href="classes.php" class="text-white text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Subjects Card -->
                            <div class="col-md-6 mb-4">
                                <div class="card dashboard-card bg-info text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Total Mata Pelajaran</h6>
                                                <h2 class="mb-0"><?php echo $pelajaranCount; ?></h2>
                                            </div>
                                            <i class="fas fa-book fa-3x opacity-50"></i>
                                        </div>
                                        <a href="subjects.php" class="text-white text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedules Card -->
                            <div class="col-md-6 mb-4">
                                <div class="card dashboard-card bg-secondary text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Total Jadwal</h6>
                                                <h2 class="mb-0"><?php echo $jwlcount; ?></h2>
                                            </div>
                                            <i class="fas fa-calendar-alt fa-3x opacity-50"></i>
                                        </div>
                                        <a href="schedules.php" class="text-white text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
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
