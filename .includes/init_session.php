<?php
session_start();
//ambil data dari sesi
$userId = $_SESSION["user_id"];
$name = $_SESSION["name"];
$role = $_SESSION["role"];
//ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification']?? null;
if ($notification){
    unset ($_SESSION['notification']);
}
/* periksa apakah sesi username dan rote sudah ada, 
jika tidak arahkan ke halaman login */
if (empty($_SESSION["username"]) || empty($_SESSION["role"])){
    $_SESSION ['notification'] = [
        'type'=>'danger',
        'massage'=>'silahkan Login terlebih dahulu!!'
    ];
    header ('Location: ./auth/login.php');
    exit(); //pastikan script berhenti setelah pengalihan
}