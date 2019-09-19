<?php
include('connection.php');
//menjalankan session
session_start();

$user = $_POST['userName'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM pengguna WHERE userName='".$user."'AND pass='".$pass."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row == TRUE) {
    echo "success";
    //set session
    $_SESSION['pengguna'] = true;//kondisi session ini apabila value username dan password true, maka akan di session true
    $_SESSION['user'] = $user;//lanjut kebawah disesion lebih rinci didalam username
    $_SESSION['pass'] = $pass;//sama kayak username   
    $_SESSION['tipe'] = $row['tipe'];//unutk mengecek session tipenya apa, apabila username dan passsword itu tipenya 1 maka langsung akses halaman index.php, klau tipenya 2 maka akan menjalankan select tabel untuk menspesifikasikan loginnya berdasarkan nis-nya 

    if ($_SESSION['tipe'] == 2) {
    	$sql2 = "SELECT * FROM siswa WHERE login='".$user."'";
    	$result2 = $conn->query($sql2);
    	$row2 = $result2->fetch_assoc();
    	$_SESSION['nis']=$row2['nis'];
    }
    // echo $_SESSION['pengguna'];
    // echo $_SESSION['user'];
    // echo $_SESSION['pass'];
    // echo $_SESSION['tipe'];
    // echo $_SESSION['nis'];
    header('location: index.php');
} else {
    echo "<script type='text/javascript'>alert('Login Failed, Coba Lagi'); window.history.go(-1) </script>";
}


// disini akan belajar menggunakan session yang mana fungsi dari session adalah mekanisme penyimpanan ke sebuah variabel agar bisa diakses atau digunakan lebih dari satu halaman


?>