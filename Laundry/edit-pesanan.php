<?php 
ob_start(); // Mulai buffer output
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Mendapatkan data dari database untuk ditampilkan di form edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
}

// Jika form edit dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nomor_hp = $_POST["nomor_hp"];
    $status = $_POST["status"];
    $total_harga = $_POST["total_harga"];
    $estimasi_selesai = $_POST["estimasi_selesai"];
    $pakaian = $_POST['pakaian'];
    $sprei = $_POST['sprei'];
    $handuk = $_POST['handuk'];
    $selimut = $_POST['selimut'];
    $karpet_kecil = $_POST['karpet_kecil'];

    // Update data pesanan ke database
    $sql = "UPDATE pesanan SET 
            nama='$nama', 
            nomor_hp='$nomor_hp', 
            status='$status', 
            total_harga='$total_harga', 
            estimasi_selesai='$estimasi_selesai', 
            pakaian='$pakaian', 
            sprei='$sprei', 
            handuk='$handuk', 
            selimut='$selimut', 
            karpet_kecil='$karpet_kecil'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pesanan.php"); // Kembali ke halaman utama setelah update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="pesanan">Pesanan</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <?php 
                                if (isset($success_message)) echo $success_message;
                                if (isset($error_message)) echo $error_message;
                                ?>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Pemesan</label>
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_hp">Nomor HP:</label>
                                            <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" value="<?php echo $row['nomor_hp']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="Proses" <?php echo ($row['status'] == 'Proses') ? 'selected' : ''; ?>>Proses</option>
                                                <option value="Selesai" <?php echo ($row['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                                                <option value="Dibatalkan" <?php echo ($row['status'] == 'Dibatalkan') ? 'selected' : ''; ?>>Dibatalkan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_harga">Total Harga:</label>
                                            <input type="number" id="total_harga" name="total_harga" class="form-control" value="<?php echo $row['total_harga']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="estimasi_selesai">Estimasi Selesai:</label>
                                            <input type="date" id="estimasi_selesai" name="estimasi_selesai" class="form-control" value="<?php echo $row['estimasi_selesai']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pakaian">Pakaian:</label>
                                            <input type="number" id="pakaian" name="pakaian" class="form-control" value="<?php echo $row['pakaian']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sprei">Sprei:</label>
                                            <input type="number" id="sprei" name="sprei" class="form-control" value="<?php echo $row['sprei']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="handuk">Handuk:</label>
                                            <input type="number" id="handuk" name="handuk" class="form-control" value="<?php echo $row['handuk']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="selimut">Selimut:</label>
                                            <input type="number" id="selimut" name="selimut" class="form-control" value="<?php echo $row['selimut']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="karpet_kecil">Karpet Kecil:</label>
                                            <input type="number" id="karpet_kecil" name="karpet_kecil" class="form-control" value="<?php echo $row['karpet_kecil']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="pesanan" class="btn btn-primary">Kembali</a>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" name="edit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
include '_footer.php'; 
ob_end_flush(); // Mengakhiri buffer output dan mengirim output ke browser
?>
