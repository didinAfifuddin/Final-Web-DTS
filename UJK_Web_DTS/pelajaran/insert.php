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

$sql = "INSERT INTO pelajaran (kode, nama_pelajaran, semester, jp)VALUES('$kode', '$nama', '$semester', '$jp')";

//connect DB to query sql
$result = $conn->query($sql);

// var_dump($result);
// die();

$cek = $result == TRUE ? "<script type='text/javascript'>alert('Succes'); location.href='tabelPelajaran.php'</script>" : "<script type='text/javascript'>alert('Failed'); location.href='tabelPelajaran.php'</script>";

echo $cek;

?>