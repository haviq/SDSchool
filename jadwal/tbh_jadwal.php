<?php
include '../koneksi/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_guru = $_POST['id_guru'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $kelas = $_POST['kelas'];
    $ruangan = $_POST['ruangan'];
    $mata_pelajaran = $_POST['mata_pelajaran'];

    $query = "INSERT INTO jadwal (id_guru, hari, jam_mulai, jam_selesai, kelas, ruangan, mata_pelajaran) 
              VALUES ('$id_guru', '$hari', '$jam_mulai', '$jam_selesai', '$kelas', '$ruangan', '$mata_pelajaran')";
    
    if (mysqli_query($conn, $query)) {
        header('Location: ../jadwal.php');
        exit();
    }
}

$query_guru = "SELECT id, nama_guru FROM guru";
$guru_result = mysqli_query($conn, $query_guru);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal - School Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Jadwal</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Guru</label>
                                <select name="id_guru" class="form-control" required>
                                    <option value="">Pilih Guru</option>
                                    <?php while($guru = mysqli_fetch_assoc($guru_result)) { ?>
                                        <option value="<?php echo $guru['id']; ?>"><?php echo $guru['nama_guru']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hari</label>
                                <select name="hari" class="form-control" required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruangan</label>
                                <input type="text" name="ruangan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mata Pelajaran</label>
                                <input type="text" name="mata_pelajaran" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="jadwal.php" class="btn btn-secondary mt-2">Kembali</a>
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
