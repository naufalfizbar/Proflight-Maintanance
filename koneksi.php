<?php
$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "pesawatt";

$connect	= new mysqli($hostname, $username, $password, $database);

if ($connect->connect_error) {
	die("Error : " . $connect->connect_error);
}
?>