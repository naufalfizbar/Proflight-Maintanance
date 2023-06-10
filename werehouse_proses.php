<?php                 
include 'koneksi.php';

$id_barang = $_POST['id_barang'];
$nama_barang  = $_POST['nama_barang'];
$banyak  = $_POST['banyak'];


$sql = "UPDATE data_gudang SET id_barang='$id_barang', nama_barang='$nama_barang', banyak='$banyak'  WHERE id_barang = '$id_barang'";
$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

if($query){
    header("Location:warehouse_monitoring.php");
}     
else {
    // echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    echo "Error: " . mysqli_error($connect);
}
?>