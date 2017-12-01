<h2 class="mt-5 text-center" style="margin-bottom: 40px;">EVENT DIIKUTI</h2>
<div class="row text-center">
	<?php

	$joined=mysql_query("SELECT * FROM tb_join, tb_event, tb_kategori WHERE tb_kategori.id_kategori=tb_event.id_kategori AND tb_join.id_event=tb_event.id_event AND tb_join.id_member=$id_member");

	while($c=mysql_fetch_array($joined)){
		$id_event = $c['id_event'];
		$nama_event = $c['nama_event'];
		$kategori = $c['nama_kategori'];
		$jumlah_peserta = $c['jumlah_peserta'];
		$tanggal = $c['tanggal'];
		$waktu = $c['waktu'];
		$lokasi = $c['lokasi'];

		$jum=mysql_query("SELECT COUNT(id_join) FROM tb_join WHERE id_event=$id_event");
		$j=mysql_fetch_array($jum);
		$jumlah_peserta_join = $j['COUNT(id_join)'];
	?>
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card">
			<img class="card-img-top" src="http://placehold.it/500x325" alt="">
			<div class="card-body">
				<h4 class="card-title"><?php echo $nama_event;?></h4>
                <h6 class="my-3"><i>Kategori <?php echo $kategori;?></i></h6>
				<p class="card-text">Tergabung (<?php echo $jumlah_peserta_join;?> dari <?php echo $jumlah_peserta;?>)<br/>
                <?php echo $tanggal;?><br/>
                <?php echo $waktu;?><br/>
                <?php echo $lokasi;?><br/></p>
			</div>
			<div class="card-footer">
				<a class="btn btn-primary" href="event.php?id_event=<?php echo $id_event;?>">Chat Room</a>
			</div>
		</div>
	</div>
	<?php }?>
</div>
<div class="row text-center">
	<div class="col-lg-3 col-md-6 mx-auto">
		<div class="card">
			<div class="card-body">
				<a class="btn btn-primary" href="tambah_event.php">Tambah Event</a>
			</div>
		</div>
	</div>
</div>