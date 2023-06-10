<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * from login where username='$username' and password='$password'";
$data = mysqli_query($connect, $sql);
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location:menu.php");
} else {
    header("Location:login.php?massage=gagal");
}
