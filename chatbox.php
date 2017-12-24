<?php

$id_member = $_SESSION['id_member'];

date_default_timezone_set('Asia/Jakarta');

//id member fungsinya sebagai PJ

if(isset($_POST['kirim'])&&isset($_GET['id_event'])) {
    $isi_chat=$_POST['isi_chat'];

    $hasil=mysql_query("INSERT INTO tb_chat SET id_member='$id_member', id_event='$id_event', isi_chat='$isi_chat', posted=NOW()");
}

?>
<div class='msgs'>
	<?php 
	include("msgs.php"); 
	?>
</div>
<form id="msg_form" action="" method="post">
	<input name="isi_chat" type="text" placeholder="Pesan.." />
	<button name="kirim" type="submit" class="btn btn-primary mt-2 mb-2">Kirim</button>
	<button name="refresh" type="submit" class="btn btn-success">Refresh Chat</button>
</form>