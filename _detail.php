<?php

//udah nge get id event

//get detail event
$event=mysql_query("SELECT * FROM tb_event, tb_kategori WHERE id_event=$id_event AND tb_kategori.id_kategori=tb_event.id_kategori");
$c=mysql_fetch_array($event);
$id_event = $c['id_event'];
$nama_event = $c['nama_event'];
$deskripsi = $c['deskripsi'];
$kategori = $c['nama_kategori'];
$jumlah_peserta = $c['jumlah_peserta'];
$tanggal = $c['tanggal'];
$waktu = $c['waktu'];
$lokasi = $c['lokasi'];
$biaya = $c['biaya'];
$banner = $c['banner_event'];
$pj_event = $c['pj_event'];

//get jumlah peserta yang join event
$jum=mysql_query("SELECT COUNT(id_join) FROM tb_join WHERE id_event=$id_event");
$j=mysql_fetch_array($jum);
$jumlah_peserta_join = $j['COUNT(id_join)'];

//hapus
if(isset($_GET['hapus'])) {
    $id_join=$_GET['hapus'];

    if($id_member!=$pj_event){
        $hasil=mysql_query("DELETE FROM tb_join WHERE id_join='$id_join'");
        //muncul alert
    }
}
?>
<div class="container">

    <h1 class="mt-4 mb-3">Detail Event</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="event.php">Event</a>
        </li>
        <li class="breadcrumb-item active">Event #<?php echo $id_event;?></li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" style="width:100%; height: 450px;" src="images/event/<?php echo $banner;?>" alt="<?php echo $banner ?>">
        </div>
        <div class="col-md-4 text-center">
            <h2 class="my-3"><?php echo $nama_event;?></h2>
            <h6 class="my-3"><i>Kategori <?php echo $kategori;?></i></h6>
            <h4 class="my-3">Deskripsi</h4>
            <p><?php echo $deskripsi;?></p>
            <h4 class="my-3">Detail Event</h4>
            <p>Peserta : (<?php echo $jumlah_peserta_join;?> dari <?php echo $jumlah_peserta;?>)<br/>
            Hari/Tanggal : <?php echo $tanggal;?><br/>
            Waktu : <?php echo $waktu;?><br/>
            Tempat : <?php echo $lokasi;?><br/>
            Biaya : <?php echo $biaya;?></p><br/>
            <?php

            //check sudah gabung atau belum
            if(isset($_SESSION['id_member'])){
                $is_join=mysql_query("SELECT * FROM tb_join WHERE id_member=$id_member AND id_event=$id_event");
                $ij=mysql_fetch_array($is_join);
                $id_join = $ij['id_join'];
                if($ij){
                    echo "<a href=\"event.php?id_event=$id_event&hapus=$id_join\" class=\"btn btn-danger\">Keluar Event</a>";
                }
                else{
                    echo "<a href=\"_join.php?id_event=$id_event\" class=\"btn btn-primary\">Gabung Event</a>";
                }
            }
            else{
                echo "<a href=\"login.php\" class=\"btn btn-primary\">Jika ingin bergabung anda harus Login</a>";
            }
            ?>
        </div>
    </div>
    <h3 class="my-4">Peserta Event</h3>
    <div class="row">
        <?php
        $member=mysql_query("SELECT * FROM tb_member, tb_join WHERE tb_member.id_member=tb_join.id_member AND tb_join.id_event=$id_event");

        while($c=mysql_fetch_array($member)){
            $id_event = $c['id_event'];
            $nama_member = $c['nama_member'];
            $email = $c['email'];
            $no_hp = $c['no_hp'];
            $foto = $c['foto'];
        ?>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-80 text-center">
                <img class="img-fluid" src="images/foto/<?php echo $foto;?>" style="height: 210px;" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $nama_member;?></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $no_hp;?></h6>
                </div>
                <div class="card-footer">
                    <a href="#"><?php echo $email;?></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <?php
        if(isset($_SESSION['id_member'])){
            $id_member = $_SESSION['id_member'];
            $member=mysql_query("SELECT * FROM tb_member WHERE id_member=$id_member");
            $c=mysql_fetch_array($member);
            $nama_member = $c['nama_member'];
        }
        else{
            $nama_member = "";
        }
    ?>
    
    <h3 class="my-4">Chatroom (<?php echo $nama_member; ?>)</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-4">
            <div class="chat">
                <?php 
                if(isset($id_join)){
                    include("chatbox.php");
                }
                else if(!isset($_SESSION['id_member'])){
                    echo "Anda belum login !";
                }
                else if(isset($_SESSION['id_member'])){
                    echo "Anda belum gabung event !";
                }
                ?>
            </div>
        </div>
    </div>
</div>