<?php                 
include 'koneksi.php';

$id_pesawat = $_POST['id_pesawat'];
$registrasi = $_POST['registrasi'];
$keberangkatan  = $_POST['keberangkatan'];
$kedatangan  = $_POST['kedatangan'];
$oli  = $_POST['oli'];
$sisa_bensin  = $_POST['sisa_bensin'];
$kondisi  = $_POST['kondisi'];
$kerusakan  = $_POST['kerusakan'];


// $start_time = $_POST['start_time'];
// $end_time = $_POST['end_time'];
// $signatureData1 = $_POST['signature1Data'];
// $signatureData2 = $_POST['signature2Data'];

//move_uploaded_file($source, $folder.$nama_file);
$insert = "UPDATE `checker` SET registrasi='$registrasi', keberangkatan='$keberangkatan', kedatangan='$kedatangan', oli='$oli', sisa_bensin='$sisa_bensin', kondisi='$kondisi', kerusakan='$kerusakan' WHERE id_pesawat = '$id_pesawat'";
 
if($insert){    
    //header("Location:menu.php");
}     
else {
    // echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    echo "Error: " . mysqli_error($connect);
}
?>