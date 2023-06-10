<?php
	include 'koneksi.php';
	$id_pesawat	=$_GET['id_pesawat'];
	$query=mysqli_query($connect,"DELETE FROM checker where id_pesawat=$id_pesawat");
   if($query)
  {
    header("location:list_mechanic_input.php");
  }
   else 
  {
    echo "Proses Input gagal";
  }
?>