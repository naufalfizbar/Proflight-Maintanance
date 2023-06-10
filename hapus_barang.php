<?php
	include 'koneksi.php';
	$id_barang	=$_GET['id_barang'];
	$query=mysqli_query($connect,"DELETE FROM data_gudang where id_barang=$id_barang");
   if($query)
  {
    header("location:warehouse_monitoring.php");
  }
   else 
  {
    echo "Proses Input gagal";
  }
?>