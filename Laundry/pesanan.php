<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Menampilkan data dari tabel pesanan
$sql = "SELECT id, nama, nomor_hp, status, total_harga, estimasi_selesai,waktu_masuk, pakaian, sprei, handuk, selimut, karpet_kecil FROM pesanan";
$result = $conn->query($sql);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="bo">Home</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>
                </div>
                <div class="tambah-data">
                    <a href="add-pesanan" class="btn btn-primary">Tambah Data</a>
                    <a href="report-pesanan" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pesanan Keseluruhan</h3>
                    </div>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Total Harga</th>
            <th>Waktu Selesai</th> 
            <th>Pakaian</th>
            <th>Sprei</th>
            <th>Handuk</th>
            <th>Selimut</th>
            <th>Karpet Kecil</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["total_harga"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["estimasi_selesai"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["pakaian"]) . " Kg</td>";
                echo "<td>" . htmlspecialchars($row["sprei"]) . " Kg</td>";
                echo "<td>" . htmlspecialchars($row["handuk"]) . " Kg</td>";
                echo "<td>" . htmlspecialchars($row["selimut"]) . " Kg</td>";
                echo "<td>" . htmlspecialchars($row["karpet_kecil"]) . " Kg</td>";
                echo "<td>";
                echo "<a href='print-pesanan.php?id=" . htmlspecialchars($row["id"]) . "' class='btn btn-info mr-2'><i i class='fa fa-print'></i></a>";
                echo "<a href='edit-pesanan.php?id=" . htmlspecialchars($row["id"]) . "' class='btn btn-primary mr-2'><i class='fa fa-edit'></i></a>";
                echo "<a href='delete-pesanan.php?id=" . htmlspecialchars($row["id"]) . "' class='btn btn-danger'><i class='fa fa-trash-o'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>     
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>

<?php include '_footer.php'; ?>
