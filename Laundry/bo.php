<?php
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php';

// Ambil tanggal hari ini dalam format MySQL (YYYY-MM-DD)
$tanggalIni = date('Y-m-d');

// Query untuk mengambil jumlah total pesanan
$sqlTotal = "SELECT COUNT(id) AS total_pesanan FROM pesanan";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalPesanan = $rowTotal['total_pesanan'];

// Query untuk mengambil jumlah pesanan bulan ini
$bulanIni = date('m');
$tahunIni = date('Y');
$sqlTotalBulanIni = "SELECT COUNT(id) AS total_pesanan_bulan_ini FROM pesanan WHERE MONTH(waktu_masuk) = $bulanIni AND YEAR(waktu_masuk) = $tahunIni";
$resultTotalBulanIni = $conn->query($sqlTotalBulanIni);
$rowTotalBulanIni = $resultTotalBulanIni->fetch_assoc();
$totalPesananBulanIni = $rowTotalBulanIni['total_pesanan_bulan_ini'];

// Query untuk mengambil jumlah pesanan hari ini
$sqlTotalHariIni = "SELECT COUNT(id) AS total_pesanan_hari_ini FROM pesanan WHERE DATE(waktu_masuk) = '$tanggalIni'";
$resultTotalHariIni = $conn->query($sqlTotalHariIni);
$rowTotalHariIni = $resultTotalHariIni->fetch_assoc();
$totalPesananHariIni = $rowTotalHariIni['total_pesanan_hari_ini'];

// Query untuk mengambil data pesanan berdasarkan bulan
$sqlMonthly = "SELECT MONTH(waktu_masuk) AS bulan, COUNT(id) AS total_per_bulan FROM pesanan WHERE YEAR(waktu_masuk) = $tahunIni GROUP BY MONTH(waktu_masuk)";
$resultMonthly = $conn->query($sqlMonthly);

// Menginisialisasi array bulan dengan nilai awal 0
$monthlyData = array_fill(1, 12, 0);

// Memasukkan data bulanan ke dalam array
while ($rowMonthly = $resultMonthly->fetch_assoc()) {
    $bulan = $rowMonthly['bulan'];
    $totalPerBulan = $rowMonthly['total_per_bulan'];
    $monthlyData[$bulan] = $totalPerBulan;
}

// Query untuk tabel rekap pesanan berdasarkan status
$sqlRekapStatus = "SELECT status, COUNT(id) AS total_pesanan FROM pesanan GROUP BY status";
$resultRekapStatus = $conn->query($sqlRekapStatus);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
<div class="content-wrapper">
    <h1 class="text-center mb-4">Dashboard Pesanan</h1>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Kunjungan Hari Ini -->
                <div class="col-lg-6 col-md-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $totalPesananHariIni; ?></h3>
                            <p><b>Pesanan Hari ini</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cart-plus"></i>
                        </div>
                    </div>
                </div>

                <!-- Kunjungan Bulan Ini -->
                <div class="col-lg-6 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $totalPesananBulanIni; ?></h3>
                            <p><b>Pesanan Bulan ini</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Data Pesanan per Bulan -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Grafik Pesanan per Bulan</h3>
                        </div>
                        <div class="box-body">
                            <canvas id="myChart" width="400" height="200"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                        datasets: [{
                                            label: 'Jumlah Pesanan',
                                            data: <?= json_encode(array_values($monthlyData)); ?>,
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 2,
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekap Status Pesanan -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Rekap Pesanan berdasarkan Status</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Total Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($rowRekapStatus = $resultRekapStatus->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $rowRekapStatus['status']; ?></td>
                                            <td><?= $rowRekapStatus['total_pesanan']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php include '_footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
