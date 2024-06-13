<?php
include "koneksi.php";
require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIS SEKOLAH</title>
    <!-- Favicon -->
    <link rel="icon" href="img/logo.png" type="image/png">
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

        .card {
            color: black;
            background-color: 		#F5F5DC;
            border-radius: 10px;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            /* Menambahkan jarak antara card aset */
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 15px;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.8);
            /* Biru Muda */
            margin-bottom: 6px;
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
        .card-img {
            position: center;
        }

        

        .card-custom {
            margin: 0 auto;
            float: none;
            margin-bottom: 20px;
        }

        .card-body-table {
            margin-top: 20px;
        }

        .table {
            width: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .row {
            width: 100%;
        }

        .centered-img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">
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
            <div class="col-xl-6 mx-auto">
                <div class="card card-custom">
                    <img class="card-img-top centered-img" src="images/card/fatahillahBG.jpeg" alt="Card image cap">
                    <div class="card-header">
                        <h4 class="card-title">INVENTARIS SMK FATAHILLAH CILEUNGSI</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-dark">Selamat datang di halaman web Inventaris. Di sini Anda dapat melihat informasi terkait inventaris sekolah seperti jumlah Barang dan Jumlah kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 card-body-table">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Total Kategori</td>
                                    <td>Total Barang</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?></td>
                                    <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang")); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

</html>
