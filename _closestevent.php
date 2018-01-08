<h2 class="mt-4 text-center" style="margin-bottom: 40px;">CLOSEST EVENT</h2>
<div class="row text-center">
	<?php

	$latest=mysql_query("SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\") FROM tb_event, tb_kategori WHERE tb_kategori.id_kategori=tb_event.id_kategori AND (tanggal>=CURDATE() OR waktu>=CURTIME()) ORDER BY tanggal ASC LIMIT 4");

	while($c=mysql_fetch_array($latest)){
		$id_event = $c['id_event'];
		$nama_event = $c['nama_event'];
		$kategori = $c['nama_kategori'];
		$jumlah_peserta = $c['jumlah_peserta'];

		//format tanggal
		$tanggal = $c['DATE_FORMAT(tanggal, "%w %Y %m %d")'];
		$hari_indo = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$bulan_indo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$hr = substr($tanggal, 0, 1);
		$thn = substr($tanggal, 2, 4);
		$bln = substr($tanggal, 7, 2);
		$tgl = substr($tanggal, 10, 2);
		$tanggal_reg = $hari_indo[(int)$hr].", ".$tgl." ".$bulan_indo[(int)$bln-1]." ".$thn;

		//format waktu
		$waktu = $c['TIME_FORMAT(waktu, "%H.%i WIB")'];

		$lokasi = $c['lokasi'];
		$banner = $c['banner_event'];

		$jum=mysql_query("SELECT COUNT(id_join) FROM tb_join WHERE id_event=$id_event");
		$j=mysql_fetch_array($jum);
		$jumlah_peserta_join = $j['COUNT(id_join)'];
	?>
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card">
			<img class="card-img-top" style="height: 150px;" src="images/event/<?php echo $banner;?>" alt="<?php echo $banner ?>">
			<div class="card-body">
				<h4 class="card-title"><?php echo $nama_event;?></h4>
                <h6 class="my-3"><i>Kategori <?php echo $kategori;?></i></h6>
				<p class="card-text">Tergabung (<?php echo $jumlah_peserta_join;?> dari <?php echo $jumlah_peserta;?>)<br/>
                <?php echo $tanggal_reg;?><br/>
                <?php echo $waktu;?><br/>
                <?php echo $lokasi;?><br/></p>
			</div>
			<div class="card-footer">
				<a class="btn btn-primary" href="event.php?id_event=<?php echo $id_event;?>">Lihat Event</a>
			</div>
		</div>
	</div>
	<?php }?>
	
</div>