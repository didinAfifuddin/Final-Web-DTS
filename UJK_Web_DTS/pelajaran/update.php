<?php

include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
    exit;
}

$kode           = $_POST['kode'];
$nama           = $_POST['nama_pelajaran'];
$semester       = $_POST['semester'];
$jp             = $_POST['jp'];

$sql = "UPDATE pelajaran SET kode='$kode', nama_pelajaran='$nama', semester='$semester', jp='$jp' WHERE kode=".$_POST['kode'];

// var_dump($sql);
// die();

//connect DB to query sql
$result = $conn->query($sql);

$cek = $result == TRUE ? "<script type='text/javascript'>alert('Update Succes'); location.href='tabelPelajaran.php'</script>" : "<script type='text/javascript'>alert('Update Failed'); location.href='tabelPelajaran.php'</script>";

echo $cek;

?>