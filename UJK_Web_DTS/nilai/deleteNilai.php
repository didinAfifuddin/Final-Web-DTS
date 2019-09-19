<?php

include('../connection.php');

session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
    exit;
}


$sql2 = "DELETE FROM nilai WHERE nilai.kode=".$_GET['kode']." AND nilai.nis=".$_GET['nis'];
// $sql = "DELETE FROM pelajaran WHERE pelajaran.kode="."$_GET['kode']";

//connect DB to query sql

$cek = $conn->query($sql2) === TRUE ? "<script type='text/javascript'>alert('Delete Succes'); window.history.go(-1) </script>" : "<script type='text/javascript'>alert('Delete Failed'); window.history.go(-1) </script>";

// var_dump($cek);
// die();

echo $cek;

?>