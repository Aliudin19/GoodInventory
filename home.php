<?php
include "koneksi.php";
require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar with Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand img {
            height: 30px;
            width: 30px;
        }

        .navbar-nav .nav-item .nav-link {
            color: white;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #f8f9fa;
        }

        .login-btn {
            color: white;
            background-color: #28a745;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #218838;
        }

        body {
            background-image: url('img/fapic3.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .kategori {
            text-align: center;
            /* Untuk menempatkan judul teks di tengah */
            margin-bottom: 20px;
            /* Atur jarak antara setiap kategori */
        }

        .garis-pembatas {
            border-top: 1px solid #ccc;
            /* Atur garis pembatas */
            margin: 10px auto;
            /* Atur jarak dari atas dan bawah */
            width: 80%;
            /* Atur lebar garis pembatas */
        }

        .dashboard-container {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            border: 2px solid #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            /* Memposisikan elemen ke tengah secara vertikal */
            /* Menambahkan jarak antara dashboard dan card */
        }

        .dashboard-title {
            font-size: 38px;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .dashboard-text {
            color: #333;
            font-size: 19px;
            margin-bottom: 20px;
        }

        .dashboard-text p {
            margin-bottom: 10px;
        }

        /* Tambahkan CSS untuk mengatur gambar di samping kiri */

        .dashboard-image {
            margin-right: 20px;
            /* Jarak antara gambar dan teks */
        }

        .dashboard-content {
            flex-grow: 1;
            /* Memungkinkan konten untuk mengisi ruang yang tersedia */
        }



        .card {
            background-color: #fff;
            border-radius: 15px;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            /* Menambahkan jarak antara card aset */
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }

        /* ... CSS sebelumnya ... */

        .card-title {
            font-size: 40px;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.8);
            /* Biru Muda */
            margin-bottom: 30px;
        }

        .card-info {
            font-size: 16px;
            color: #28a745;
            /* Hijau Muda */
            margin-bottom: 10px;
        }

        .card-number {
            font-size: 24px;
            font-weight: bold;
            color: #ffc107;
            /* Oranye */
        }

        /* Tambahkan warna untuk garis pembatas */
        .garis-pembatas {
            border-top: 1px solid #007bff;
            /* Biru Muda */
            margin: 10px auto;
            width: 80%;
        }

        .card-custom {
            height: 250px;
            /* Adjust height as needed */
        }

        .card-custom .card-body,
        .card-custom .card-footer {
            padding: 10px;
            /* Adjust padding as needed */
        }

        .card-custom .card-title {
            font-size: 1rem;
            /* Adjust font size as needed */
        }

        .card-custom img {
            height: 100px;
            /* Adjust height as needed */
            object-fit: cover;
        }

        .card-custom .card-text {
            font-size: 0.875rem;
            /* Adjust font size as needed */
        }

        .card-custom {
            height: 325px;
            /* Adjust height as needed */
        }

        .card-custom .card-body,
        .card-custom .card-footer {
            padding: 10px;
            /* Adjust padding as needed */
        }

        .card-custom .card-title {
            font-size: 1.5rem;
            /* Adjust font size as needed */
        }

        .card-custom img {
            height: 170px;
            /* Adjust height as needed */
            object-fit: cover;
        }

        .card-custom .card-text {
            font-size: 0.950rem;
            /* Adjust font size as needed */
        }

         </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.png" alt="Logo">
            Inventory
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar_barang.php">Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori_barang.php">Daftar Kategori</a>
                </li>

            </ul>
            <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
        </div>
    </nav>

    <div class="container mt-1">
        <div class="row">
            <div class="col-xl-6">
                <div class="card card-custom">
                    <img class="card-img-top img-fluid centered-img" src="images/card/fatahillahBG.jpeg" alt="Card image cap">
                    <div class="card-header">
                        <h4 class="card-title">INVENTARIS SMK FATAHILLAH CILEUNGSI</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-dark">Selamat datang di halaman web Inventaris. Di sini Anda dapat melihat informasi terkait inventaris sekolah seperti jumlah Barang dan Jumlah kategori</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="daftar_barang.php" style="text-decoration: none; color: inherit;">
                        <div class="widget-stat card bg-info">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="fas fa-archive fa-3x"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                        <p class="mb-1">Total Barang</p>
                                        <h3 class="text-white">
                                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang")); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="kategori_barang.php" style="text-decoration: none; color: inherit;">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="fas fa-school fa-3x"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                        <p class="mb-1">Total Kategory</p>
                                        <h3 class="text-white">
                                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="?page=RuangPenunjang" style="text-decoration: none; color: inherit;">
                        <div class="widget-stat card bg-success">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="fas fa-place-of-worship fa-3x"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                        <p class="mb-1">Ruang Penunjang</p>
                                        <h3 class="text-white">
                                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penunjang")); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="?page=penyimpanan" style="text-decoration: none; color: inherit;">
                        <div class="widget-stat card bg-danger">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="fas fa-warehouse fa-3x"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                        <p class="mb-1">Alat Penyimpanan</p>
                                        <h3 class="text-white">
                                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penyimpanan")); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <script>
                function printContent(el) {
                    var restorepage = document.body.innerHTML;
                    var printcontent = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printcontent;
                    window.print();
                    document.body.innerHTML = restorepage;
                }
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('searchInput').addEventListener('input', filterTable);
                    document.getElementById('categoryFilter').addEventListener('change', filterTable);
                });



                function scrollToTable(direction) {
                    const table = document.getElementById('dataTable1');
                    const rows = table.querySelectorAll('tbody tr');
                    let targetRow;

                    if (direction === 'down') {
                        for (let i = 0; i < rows.length; i++) {
                            if (rows[i].style.display !== 'none') {
                                targetRow = rows[i];
                                break;
                            }
                        }
                    } else {
                        for (let i = rows.length - 1; i >= 0; i--) {
                            if (rows[i].style.display !== 'none') {
                                targetRow = rows[i];
                                break;
                            }
                        }
                    }

                    if (targetRow) {
                        targetRow.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }

                function filterTable() {
                    const searchInput = document.getElementById('searchInput').value.toUpperCase();
                    const categoryFilter = document.getElementById('categoryFilter').value.toUpperCase();
                    const table = document.getElementById('dataTable1');
                    const tr = table.querySelectorAll('tbody tr');

                    for (let i = 0; i < tr.length; i++) {
                        let match = false;
                        const td = tr[i].getElementsByTagName('td');
                        for (let j = 0; j < td.length; j++) {
                            if (td[j]) {
                                const textValue = td[j].innerText.toUpperCase();
                                if (textValue.indexOf(searchInput) > -1 &&
                                    (categoryFilter === "" || (j === 2 && textValue === categoryFilter))) {
                                    match = true;
                                    break;
                                }
                            }
                        }
                        tr[i].style.display = match ? '' : 'none';
                    }
                }
            </script>
</body>