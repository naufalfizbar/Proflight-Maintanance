<?php
date_default_timezone_set('Asia/Jakarta');
include 'koneksi.php';

$id = $_GET['id'];
$waktu = date("l jS \of F Y h:i:s A");
$status = $_GET['status'];
$sql;
if($status == 0){
    $sql = "UPDATE `checker` SET status_repair = '0', start_time='$waktu' WHERE id_pesawat = '$id'";
}else{
    $sql = "UPDATE `checker` SET status_repair = '1', end_time='$waktu' WHERE id_pesawat = '$id'";
}

$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));
if($query){    
    header("location:mechanic_form.php?id=$id");
}     
else {
    // echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    echo "Error: " . mysqli_error($connect);
}

?>