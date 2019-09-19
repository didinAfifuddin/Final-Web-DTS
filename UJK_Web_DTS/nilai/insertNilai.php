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
$kode           = $_POST['kode'];
$nilai          = $_POST['nilai_siswa'];

$sql = "INSERT INTO nilai (nis, kode, nilai_siswa)VALUES('$nis', '$kode', '$nilai')";

// var_dump($sql);
// die();

//connect DB to query sql
$result = $conn->query($sql);

$cek = $result === TRUE ? "<script type='text/javascript'>alert('Succes'); window.history.go(-2) </script>" : "<script type='text/javascript'>alert('Failed'); window.history.go(-2) </script>";

echo $cek;

?>