<?php
include 'koneksi/config.php';

// Query to get all classes
$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas - School Information System</title>
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
            transition: all 0.3s;
        }
        .nav-link:hover {
            background-color: #34495e;
            color: white;
        }
        .nav-link.active {
            background-color: #3498db;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
        }
        .btn {
            border-radius: 5px;
        }
        .table th {
            background-color: #f8f9fa;
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
        <!-- Add this navbar for logout -->
        <nav class="navbar justify-content-end p-3">
            <a href="logout.php" class="btn btn-danger">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </nav>
        
        <div class="container-fluid">
            <!-- Rest of your existing content -->

            

            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Kelas</h5>
                    <a href="kelas/tambahkelas.php" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Tambah Kelas
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Kapasitas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                while($row = mysqli_fetch_assoc($result)) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['kode_kelas']; ?></td>
                                    <td><?php echo $row['nama_kelas']; ?></td>
                                    <td><?php echo $row['wali_kelas']; ?></td>
                                    <td><?php echo $row['tingkat']; ?></td>
                                    <td><?php echo $row['kapasitas']; ?></td>
                                    <td><?php echo $row['tahun_ajaran']; ?></td>
                                    <td>
                                        <span class="badge <?php echo $row['status'] == 'Aktif' ? 'bg-success' : 'bg-danger'; ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="kelas/editkelas.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="kelas/hapuskelas.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
