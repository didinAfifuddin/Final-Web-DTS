<?php

include('../connection.php');
session_start();
//cek dulu apakah dihalaman ini apakah udah login apa belum

if (!isset($_SESSION['pengguna'])) {
//jika tidak ada session login maka akan dipindaghkan ke halam sebelumnya
    header('location: formLogin.php');
    exit;
}


$sql2 = "DELETE FROM nilai WHERE nilai.nis=".$_GET['nis'];
$sql = "DELETE FROM siswa WHERE siswa.nis=".$_GET['nis'];
// var_dump($sql);
// die();

//connect DB to query sql

$cek = ($conn->query($sql2) && $conn->query($sql)) === TRUE ? "<script type='text/javascript'>alert('Delete Succes'); location.href='tabel.php'</script>" : "<script type='text/javascript'>alert('Delete Failed'); location.href='tabel.php'</script>";

echo $cek;

?>