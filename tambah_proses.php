<?php
include 'koneksi.php';

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$banyak= $_POST['banyak'];
$folder = './upload/';

move_uploaded_file($source, $folder.$nama_file);
$sql	= "UPDATE banyak SET nama_barang='$nama_barang', banyak = '$banyak', foto ='$nama_file' WHERE id_barang = '$id_barang'";

$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query) {
	header("location:warehouse_tambah.php");
} else {
	echo "Input Data Gagal.";
    
}
