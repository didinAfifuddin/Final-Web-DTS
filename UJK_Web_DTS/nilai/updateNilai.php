<?php

include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
    exit;
}

$nilai = $_POST['nilai_siswa'];
$kode = $_POST['kode'];
$nis = $_POST['nis'];

$sql = "UPDATE nilai SET nilai_siswa='$nilai' WHERE kode=".$_POST['kode']." AND nis=".$_POST['nis'];
// var_dump($sql);
// die();

//connect DB to query sql
$result = $conn->query($sql);

$cek = $result === TRUE ? "<script type='text/javascript'>alert('Update Succes'); window.history.go(-2)</script>" : "<script type='text/javascript'>alert('Update Failed'); window.history.go(-2) </script>";

echo $cek;

?>