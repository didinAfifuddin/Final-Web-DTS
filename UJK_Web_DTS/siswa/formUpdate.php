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
<title>form siswa</title>
<script src="popUp.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
            <?php
            include('../header.php');
            ?>  
        <div class="col" id="main">
            <div class="containerTabel">
                <div class="containerForm">
                    <a href="tabel.php" class="back" style="color: #A0A399;">V</a>
                    <h3 style="color: #138496;">Form Siswa</h3><br>
                    <?php
                    $sql = "SELECT siswa.* FROM siswa WHERE siswa.nis=".$_GET['nis'];
                    // var_dump($sql);
                    // die();
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo
                        "<form action='update.php' method='POST'>
                            <div class='form-group'>
                                <label for='exampleFormControlInput1'>NIS</label>
                                <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Masukan NIM' value='".$row['nis']."' name='nis' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlInput1'>Nama</label>
                                <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Masukan Nama' value='".$row['nama']."' name='nama'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlInput1'>Alamat</label>
                                <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Masukan Alamat' value='".$row['alamat']."' name='alamat'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlInput1'>Tanggal Lahir</label>
                                <input type='date' class='form-control' id='exampleFormControlInput1' placeholder='Masukan Tanggal Lahir' value='".$row['tgl_lahir']."' name='tgl_lahir'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlInput1'>Tempat Lahir</label>
                                <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Masukan Tempat Lahir' value='".$row['tmpt_lahir']."' name='tmpt_lahir'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlSelect1'>Agama</label>
                                <select class='form-control' id='exampleFormControlSelect1' value='".$row['agama']."' name='agama'>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                    <option>Katolik</option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlTextarea1'>No Hp</label>
                                <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Masukan Ho Hp' value='".$row['no_hp']."' name='no_hp'>
                            </div>
                            <input class='btn btn-info' type='submit' value='Update'>
                        </form>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>