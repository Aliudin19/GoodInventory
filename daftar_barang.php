<?php
include "koneksi.php";
require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Inventaris Sekolah</title>
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="img/logo.png" type="image/png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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

    <?php
    use Picqer\Barcode\BarcodeGeneratorPNG;

    $query = mysqli_query($koneksi, "SELECT barang.*, kategori.nama_kategori FROM barang LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori ");

    // Penanganan Error (Opsional)
    if (!$query) {
        die("Error dalam query: " . mysqli_error($koneksi));
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <title>Barang SMK FATAHILLAH</title>
        <style>
            .text-center {
                margin-top: 50px;
            }

            .text-center h1 {
                font-size: 36px;
                font-weight: bold;
                color: #333;
            }

            .text-center hr {
                border: 2px solid #333;
                width: 50px;
                margin: 20px auto;
            }

            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .btn-primary {
                padding: 0.5rem 1rem;
                font-size: 1rem;
                text-align: center;
                text-decoration: none;
                color: white;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
            }

            .btn-secondary {
                padding: 0.5rem 1rem;
                font-size: 1rem;
                text-align: center;
                text-decoration: none;
                color: white;
                background-color: #6c757d;
                border: none;
                border-radius: 5px;
            }

            .card {
                margin: 0 2rem;
                padding: 1rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 1rem;
            }

            .card-header h6 {
                margin: 0;
                font-weight: bold;
                color: #333;
            }

            .btn-primary,
            .btn-secondary {
                padding: 0.5rem 1rem;
                font-size: 1rem;
                text-align: center;
                text-decoration: none;
                color: white;
                background-color: #007bff;
                border: none;
                border-radius: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                padding: 10px;
                text-align: center;
                border: 1px solid #ddd;
                vertical-align: middle;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            .table-responsive {
                overflow-x: auto;
            }

            @media print {
                body * {
                    visibility: hidden;
                }

                .print-area,
                .print-area * {
                    visibility: visible;
                }

                .print-area {
                    position: absolute;
                    left: 0;
                    top: 0;
                }

                .btn,
                .card-header a {
                    display: none;
                }
            }

            /* CSS for green border */
            .input-group .form-control,
            .input-group .form-select {
                border: 2px solid lightgray;
                border-radius: 5px;
            }
        </style>

    </head>


    <body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="text-center mb-4">
            <h1 class="h3 mb-2 text-gray-800">DAFTAR BARANG SMK FATAHILLAH</h1>
            <hr>
        </div>
        <div class="row justify-content-center mb-3">


        </div>
        <!-- DataTales  -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Kode Barang & Barcode</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1 + $offset;
                                while ($data = mysqli_fetch_array($query)) {
                                    $generator = new BarcodeGeneratorPNG();
                                    $barcode = base64_encode($generator->getBarcode($data['kode_barang'], $generator::TYPE_CODE_128));

                                    // Mengganti karakter yang tidak valid pada ID dengan karakter yang valid
                                    $modalId = str_replace('.', '-', $data['kode_barang']);
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $modalId; ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                        </td>
                                        <td>
                                            <?php echo $data['kode_barang']; ?><br>
                                            <img src="data:image/png;base64,<?php echo $barcode; ?>" alt="Barcode">
                                        </td>
                                        
                                    </tr>
                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="detailModal<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Tampilkan gambar dari data BLOB -->
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($data['foto']); ?>" class="card-img-top" alt="Detail Aset">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php echo $data['nama_barang']; ?></h4>
                                                        <h5 class="card-text">Jumlah : <?php echo $data['jumlah']; ?></h5>
                                                        <h5 class="card-text">Status : <?php echo $data['kondisi']; ?></h5>
                                                        <h5 class="card-text">Lokasi : <?php echo $data['lokasi']; ?></h5>
                                                        <p>Keterangan Status : <br> baik -> Barang tidak ada yang rusak <br> rusak ringan -> beberapa rusak <br> rusak parah -> kebanyakan rusak </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Tambahkan tombol "Close" -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    </body>