<?php
include '../koneksi/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM jadwal WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $jadwal = mysqli_fetch_assoc($result);

    // Fetch guru list
    $guruQuery = "SELECT id, nama_guru FROM guru";
    $guruResult = mysqli_query($conn, $guruQuery);
}

if (isset($_POST['update'])) {
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $id_guru = $_POST['id_guru'];
    $kelas = $_POST['kelas'];
    $ruangan = $_POST['ruangan'];

    $updateQuery = "UPDATE jadwal SET 
                   hari = '$hari',
                   jam_mulai = '$jam_mulai',
                   jam_selesai = '$jam_selesai',
                   mata_pelajaran = '$mata_pelajaran',
                   id_guru = '$id_guru',
                   kelas = '$kelas',
                   ruangan = '$ruangan'
                   WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: ../jadwal.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal - School Information System</title>
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
                    <a href="pelajaran.php" class="nav-link">
                        <i class="fas fa-book me-2"></i> Mata Pelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a href="jadwal.php" class="nav-link active">
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
                        <h2 class="mb-4">Edit Jadwal</h2>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Hari</label>
                                        <select name="hari" class="form-select" required>
                                            <option value="Senin" <?php echo ($jadwal['hari'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                                            <option value="Selasa" <?php echo ($jadwal['hari'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                                            <option value="Rabu" <?php echo ($jadwal['hari'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                                            <option value="Kamis" <?php echo ($jadwal['hari'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                                            <option value="Jumat" <?php echo ($jadwal['hari'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                                            <option value="Sabtu" <?php echo ($jadwal['hari'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jam Mulai</label>
                                        <input type="time" name="jam_mulai" class="form-control" value="<?php echo $jadwal['jam_mulai']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jam Selesai</label>
                                        <input type="time" name="jam_selesai" class="form-control" value="<?php echo $jadwal['jam_selesai']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mata Pelajaran</label>
                                        <input type="text" name="mata_pelajaran" class="form-control" value="<?php echo $jadwal['mata_pelajaran']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Guru</label>
                                        <select name="id_guru" class="form-select" required>
                                            <?php while($guru = mysqli_fetch_assoc($guruResult)) { ?>
                                                <option value="<?php echo $guru['id']; ?>" <?php echo ($jadwal['id_guru'] == $guru['id']) ? 'selected' : ''; ?>>
                                                    <?php echo $guru['nama_guru']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" value="<?php echo $jadwal['kelas']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ruangan</label>
                                        <input type="text" name="ruangan" class="form-control" value="<?php echo $jadwal['ruangan']; ?>" required>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary">Update Jadwal</button>
                                    <a href="jadwal.php" class="btn btn-secondary">Kembali</a>
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
