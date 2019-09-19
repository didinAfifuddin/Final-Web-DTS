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
                if ($_SESSION['tipe'] == 1) {
                    //jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
                    echo
                    "<a href='formNilai.php' class='btn btn-info' id='btn'><b>+</b></a><br><br>";
                    }
                ?>
                <?php
                if ($_SESSION['tipe'] == 1) {
                        $sql = "SELECT siswa.*, nilai.nilai_siswa, pelajaran.kode, pelajaran.nama_pelajaran FROM siswa, nilai, pelajaran WHERE pelajaran.kode=nilai.kode AND nilai.nis=siswa.nis AND siswa.nis=".$_GET['nis'];
                    }else{
                        $sql = "SELECT siswa.*, nilai.nilai_siswa, pelajaran.kode, pelajaran.nama_pelajaran FROM siswa, nilai, pelajaran WHERE pelajaran.kode=nilai.kode AND nilai.nis=siswa.nis AND siswa.nis='".$_SESSION['nis']."';";
                    }

                    // mengkoneksikan qurey sql
                    $result = $conn->query($sql);
                    // mengambil per baris data untuk ditampilkan
                    $row = $result->fetch_assoc();

                    if ($row == TRUE) {
                        
                        echo
                        "<form action='tabelNilai.php' method='GET'>";

                            if($_SESSION['tipe'] == 1){    
                            echo
                            "<div class='cari'>
                                <div class='input-group mb-3'>
                                    <input type='text' class='form-control' placeholder='Masukan NIS Untuk Mencari Nilai Siswa' aria-label='Recipient's username' aria-describedby='button-addon2' name='nis'>
                                    <div class='input-group-append'>
                                        <button class='btn btn-outline-info' type='submit' id='button-addon2'>Search</button>
                                    </div>
                                </div>
                            </div>";
                            }

                        echo    
                        "</form>
                        <p>NIS : ".$row['nis']."</p>
                        <p>Nama : ".$row['nama']."</p>

                        <table class='table table-hover'>
                        <thead class='bg-info' style='color: white;'>
                            <tr>
                                <th scope='col'>No</th>
                                <th scope='col'>Kode Pelajaran</th>
                                <th scope='col'>Nama Pelajaran</th>
                                <th scope='col'>Nilai Siswa</th>
                                <th scope='col'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
                
                        $no=1;
                        // penggunaan while untuk menampilkan data secara berulang, sesuai data yang tersedia
                        while($row) {
                        echo
                            "<tr>
                                <th scope='row'>".$no."</th>
                                <td>".$row['kode']."</td>
                                <td>".$row['nama_pelajaran']."</td>
                                <td>".$row['nilai_siswa']."</td>";
                                if ($_SESSION['tipe'] == 1) {
                                    echo
                                    "<td>
                                    <a href='formUpdateNilai.php?kode=".$row['kode']."&nis=".$row['nis']."'class='btn btn-success' type='submit'>Update</a>
                                    <a href='deleteNilai.php?kode=".$row['kode']."&nis=".$row['nis']." 'class='btn btn-danger' type='submit'>Delete</a>
                                    </td>";
                                    }
                            echo
                            "</tr>";
                        $no++;
                        $row = $result->fetch_assoc();
                        }
                    } else {
                        echo 
                        "<div class='alert alert-danger' role='alert'>
                            Nilai dengan NIS <b>".$_GET['nis']."</b> yang anda masukan tidak terdaftar
                        </div>";
                    }
                    echo
                        "</tbody>
                    </table>";
                    $row = $result->fetch_assoc();

                    if($_SESSION['tipe'] == 1){
                        $sql2 = "SELECT AVG(nilai_siswa) as avg, SUM(nilai_siswa) as sum FROM nilai WHERE nilai.nis=".$_GET['nis']; 
                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_assoc();
                    }else{
                        $sql2 = "SELECT AVG(nilai_siswa) as avg, SUM(nilai_siswa) as sum FROM nilai WHERE nilai.nis='".$_SESSION['nis']."';"; 
                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_assoc();
                    }

                    echo "Jumlah Nilai : ".$row2['sum']."<br>";
                    echo "Rata-rata Nilai : ".$row2['avg'];
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