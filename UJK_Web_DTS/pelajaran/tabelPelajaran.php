<?php
include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: ../formLogin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/style.css">
<!-- <script src="popUp.js"></script> -->
<title>Tabel Pelajaran</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
            <?php
            include('../header.php');
            ?>  
        <div class="col" id="main">
            <div class="containerTabel">
                <h3 style="color: #138496;">Tabel Pelajaran</h3><br>
                <a href="formPelajaran.php" class="btn btn-info" id="btn"><b>+</b></a><br><br>
                <table class="table table-hover">
                    <thead class="bg-info" style="color: white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Pelajaran</th>
                            <th scope="col">Nama Pelajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Jam Pelajaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- menseleksi semua tabel berdasarkan NIS-nya untuk ditampilkan ditabel dengan query-->
                    <?php
                        $sql = "SELECT * FROM pelajaran WHERE kode";
                        // mengkoneksikan qurey sql
                        $result = $conn->query($sql);
                        // mengambil per baris data untuk ditampilkan
                        $row = $result->fetch_assoc();
                        $no=1;
                        // penggunaan while untuk menampilkan data secara berulang, sesuai data yang tersedia
                        while($row) {
                        echo
                            "<tr>
                                <th scope='row'>".$no."</th>
                                <td>".$row['kode']."</td>
                                <td>".$row['nama_pelajaran']."</td>
                                <td>".$row['semester']."</td>
                                <td>".$row['jp']."</td>
                                <td>
                                    <a href='formUpdatepelajaran.php?kode=".$row['kode']."'class='btn btn-success' type='submit'>Update</a>
                                    <a href='delete.php?kode=".$row['kode']."'class='btn btn-danger' type='submit'>Delete</a>
                                </td>
                            </tr>";
                        $no++;
                        $row = $result->fetch_assoc();
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>