<?php
session_start();
include "_config.php";

date_default_timezone_set('Asia/Jakarta');
$id_member = $_SESSION['id_member'];

if(isset($_GET['id_event'])){
	$tanggal = date('Y-m-d H:i:s');
	$id_event=$_GET['id_event'];

	$join=mysql_query("INSERT INTO tb_join SET id_member='$id_member', id_event='$id_event', tanggal_join='$tanggal'");

	header("location:event.php?id_event=$id_event");
}

?>
 