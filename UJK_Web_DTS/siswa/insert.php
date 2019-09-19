<?php

include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
    exit;
}

$nis            = $_POST['nis'];
$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];
$tglLahir       = $_POST['tgl_lahir'];
$tempatLahir    = $_POST['tmpt_lahir'];
$agama          = $_POST['agama'];
$noHp           = $_POST['no_hp'];

$sql = "INSERT INTO siswa (nis, nama, alamat, tgl_lahir, tmpt_lahir, agama, no_hp)VALUES('$nis', '$nama', '$alamat', '$tglLahir', '$tempatLahir', '$agama', '$noHp')";

//connect DB to query sql
$result = $conn->query($sql);

// var_dump($result);
// die();

$cek = $result === TRUE ? "<script type='text/javascript'>alert('Succes'); location.href='tabel.php'</script>" : "<script type='text/javascript'>alert('Failed'); location.href='tabel.php'</script>";

echo $cek;

?>