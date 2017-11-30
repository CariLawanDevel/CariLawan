<div class="container">

    <h1 class="mt-4 mb-3">New Event</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a href="event.php">Event</a>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <?php

            if(isset($_GET['id_kategori'])){
                $id_kategori=$_GET['id_kategori'];
                $latest=mysql_query("SELECT *, nama_member FROM tb_member, tb_event, tb_kategori WHERE tb_member.id_member=tb_event.id_member AND tb_kategori.id_kategori=tb_event.id_kategori AND tb_kategori.id_kategori=$id_kategori ORDER BY id_event");
            }
            else{
                $latest=mysql_query("SELECT *, nama_member FROM tb_member, tb_event, tb_kategori WHERE tb_member.id_member=tb_event.id_member AND tb_kategori.id_kategori=tb_event.id_kategori ORDER BY id_event");
            }

            while($c=mysql_fetch_array($latest)){
                $id_event = $c['id_event'];
                $nama_event = $c['nama_event'];
                $deskripsi = $c['deskripsi'];
                $kategori = $c['nama_kategori'];
                $jumlah_peserta = $c['jumlah_peserta'];
                $tanggal = $c['tanggal'];
                $waktu = $c['waktu'];
                $lokasi = $c['lokasi'];
                $nama_pj = $c['nama_member'];

                $jum=mysql_query("SELECT COUNT(id_join) FROM tb_join WHERE id_member=$id_member AND id_event=$id_event");
                $j=mysql_fetch_array($jum);
                $jumlah_peserta_join = $j['COUNT(id_join)'];
            ?>
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $nama_event;?></h2>
                    <h6 class="my-3"><i>Kategori <?php echo $kategori;?></i></h6>
                    <p class="card-text"><?php echo $deskripsi;?><br/>
                    Tergabung (<?php echo $jumlah_peserta_join;?> dari <?php echo $jumlah_peserta;?>)<br/>
                    <?php echo $tanggal;?> (<?php echo $waktu;?>)<br/>
                    <?php echo $lokasi;?><br/>
                    <a style="margin-top: 12px;" href="event.php?id_event=<?php echo $id_event;?>" class="btn btn-primary">Gabung Event</a>
                </div>
                <div class="card-footer text-muted">Posted by <a href="#"><?php echo $nama_pj;?></a>
                </div>
            </div>
            <?php }?>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>

        <div class="col-md-4">

            <?php include '_search.php'; ?>

            <?php include '_categories.php'; ?>

        </div>

    </div>
    
</div>