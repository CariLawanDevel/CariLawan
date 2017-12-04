<?php 
include ("_config.php");

function login($username, $password){
	$cek = mysql_query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
	$hasil = mysql_num_rows($cek);
	return $hasil;
}

?>