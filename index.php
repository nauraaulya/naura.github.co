<?php 
if(isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

$query = "SELECT * FROM produk";
$eksekusi = mysqli_query($conn, $query);
$data = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC);
$no = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
       /* Styling sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background: #343a40;
    color: white;
    position: fixed;
    padding: 20px;
}

.sidebar h2 {
    position: center;
    font-size: 22px;
    margin-bottom: 20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: 0.3s;
}

.sidebar ul li a:hover {
    background: #495057;
}

/* Styling content */
.content {
    margin-left: 270px;
    padding: 20px;
}

/* Styling tombol tambah */
button {
    background: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button a {
    color: white;
    text-decoration: none;
}

button:hover {
    background: #0056b3;
}

/* Styling tabel */
.card {
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    text-align: center;
}

thead.table-dark {
    background: #212529;
    color: white;
}

tbody tr:nth-child(even) {
    background: #f8f9fa;
}

/* Responsif */
@media screen and (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .content {
        margin-left: 0;
    }
}

    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>pipiyi mart</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="barang.php">Produk</a></li>
            <li><a href="transaksi.php">Pembelian</a></li>
            <li><a href="rekap.php">Rekap Pembelian</a></li>
            <li><a href="rekap_bulan.php">Laporan Perbulan</a></li>
            <li><a href="logout.php">Logout</a></li>
            
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h4 style="font-size: 50px ">Daftar Produk</h4>
                </div>
            </div>
            
            <!-- Tabel Produk -->
            <button><a href="barang_add.php">Tambah Barang</a></button>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>KODE PRODUK</th>
                                <th>NAMA PRODUK</th>
                                <th>STOK</th>
                                <th>HARGA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $datas['kode_produk']; ?></td>
                                    <td><?= $datas['nama_produk']; ?></td>
                                    <td><?= $datas['stok']; ?></td>
                                    <td>Rp. <?= number_format($datas['harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <a href="barang_edit.php?id=<?= $datas['id'] ?>">Edit</a>
                                        <a href="barang_hapus.php?id=<?= $datas['id'] ?>">Hapus</a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
