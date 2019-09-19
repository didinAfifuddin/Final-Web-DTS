<?php
include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
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
                <h3 style="color: #138496;">Tabel Nilai</h3><br>
                <?php
                    $sql = "SELECT pelajaran.*, nilai.nilai_siswa, siswa.nis, siswa.nama FROM siswa, nilai, pelajaran WHERE pelajaran.kode=nilai.kode AND nilai.nis=siswa.nis AND pelajaran.kode=".$_GET['kode'];

                    // mengkoneksikan qurey sql
                    $result = $conn->query($sql);
                    // mengambil per baris data untuk ditampilkan
                    $row = $result->fetch_assoc();

                    if ($row == TRUE) {
                        
                        echo
                        "<form action='tabelNilaiPelajaran.php' method='GET'>
                            <div class='cari'>
                                <div class='input-group mb-3'>
                                    <input type='text' class='form-control' placeholder='Masukan Kode Pelajaran' aria-label='Recipient's username' aria-describedby='button-addon2' name='kode'>
                                    <div class='input-group-append'>
                                        <button class='btn btn-outline-info' type='submit' id='button-addon2'>Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p>Kode : ".$row['kode']."</p>
                        <p>Pelajaran : ".$row['nama_pelajaran']."</p>

                        <table class='table table-hover'>
                        <thead class='bg-info' style='color: white;'>
                            <tr>
                                <th scope='col'>No</th>
                                <th scope='col'>NIS</th>
                                <th scope='col'>Nama Siswa</th>
                                <th scope='col'>Nilai Siswa</th>
                            </tr>
                        </thead>
                        <tbody>";
                
                        $no=1;
                        // penggunaan while untuk menampilkan data secara berulang, sesuai data yang tersedia
                        while($row) {
                        echo
                            "<tr>
                                <th scope='row'>".$no."</th>
                                <td>".$row['nis']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['nilai_siswa']."</td>
                            </tr>";
                        $no++;
                        $row = $result->fetch_assoc();
                        }
                    } else {
                        echo 
                        "<div class='alert alert-danger' role='alert'>
                            Nilai dengan NIS <b>".$_GET['kode']."</b> yang anda masukan tidak terdaftar
                        </div>";
                    }
                    echo
                        "</tbody>
                    </table>";
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>