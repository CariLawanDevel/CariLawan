<?php


date_default_timezone_set('Asia/Jakarta');

//id member fungsinya sebagai PJ

if(isset($_POST['tambah_event'])) {
    $tanggal = date('Y-m-d H:i:s');

    $nama_event=$_POST['nama_event'];
    $kategori=$_POST['kategori'];
    $deskripsi=$_POST['deskripsi'];
    $tanggal=$_POST['tanggal'];
    $waktu=$_POST['waktu'];
    $jumlah_peserta=$_POST['jumlah_peserta'];
    $lokasi=$_POST['lokasi'];
    $biaya=$_POST['biaya'];
    $pj_event=$_POST['pj_event'];
    $banner_event = rand(1000,100000)."-".$_FILES['banner_event']['name'];
    $banner_loc = $_FILES['banner_event']['tmp_name'];
    $folder="images/event/";
    move_uploaded_file($banner_loc,$folder.$banner_event);

    $hasil=mysql_query("INSERT INTO tb_event SET nama_event='$nama_event', id_kategori='$kategori', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', jumlah_peserta='$jumlah_peserta', lokasi='$lokasi', biaya='$biaya', banner_event='$banner_event', pj_event='$pj_event'");
    if($hasil){
        $get_id=mysql_query("SELECT id_event FROM tb_event WHERE nama_event='$nama_event' AND deskripsi='$deskripsi'") or die (error_reporting());
        $c=mysql_fetch_array($get_id);
        $id_event=$c['id_event'];

        $join=mysql_query("INSERT INTO tb_join SET id_member='$pj_event', id_event='$id_event', tanggal_join='$tanggal'");
        if($join){
            header("location:manage.php?page=event");
        }
    }
}

if(isset($_GET['id_event'])) {
    $id_event=$_GET['id_event'];

    $hasil=mysql_query("SELECT * FROM tb_event WHERE id_event='$id_event'");
    $c=mysql_fetch_array($hasil);
    $nama_event=$c['nama_event'];
    $id_kategori=$c['id_kategori'];
    $deskripsi=$c['deskripsi'];
    $tanggal=$c['tanggal'];
    $waktu=$c['waktu'];
    $jumlah_peserta=$c['jumlah_peserta'];
    $lokasi=$c['lokasi'];
    $biaya=$c['biaya'];
    $pj_event=$c['pj_event'];
}
if(isset($_POST['edit_event'])) {
    $nama_event=$_POST['nama_event'];
    $kategori=$_POST['kategori'];
    $deskripsi=$_POST['deskripsi'];
    $tanggal=$_POST['tanggal'];
    $waktu=$_POST['waktu'];
    $jumlah_peserta=$_POST['jumlah_peserta'];
    $lokasi=$_POST['lokasi'];
    $biaya=$_POST['biaya'];
    $pj_event=$_POST['pj_event'];
    $banner_event = rand(1000,100000)."-".$_FILES['banner_event']['name'];
    $banner_loc = $_FILES['banner_event']['tmp_name'];
    $folder="images/event/";
    move_uploaded_file($banner_loc,$folder.$banner_event);

    $hasil=mysql_query("UPDATE tb_event SET nama_event='$nama_event', id_kategori='$kategori', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', jumlah_peserta='$jumlah_peserta', lokasi='$lokasi', biaya='$biaya', banner_event='$banner_event', pj_event='$pj_event' WHERE id_event='$id_event'");
    if($hasil){

        header("location:manage.php?page=event");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container mb-4 mt-4">
        <h1 class="mt-4">New Member</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Event : </label>
                            <input name="nama_event" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_event'])){
                                echo $nama_event;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Kategori : </label>
                            <select name="kategori" class="form-control" id="kategori"">
                                <?php

                                $cat=mysql_query("SELECT * FROM tb_kategori");

                                while($c=mysql_fetch_array($cat)){
                                    $id_kategori = $c['id_kategori'];
                                    $nama_kategori = $c['nama_kategori'];
                                ?>
                                <option value="<?php echo $id_kategori;?>"><?php echo $nama_kategori;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Deskripsi :</label>
                            <textarea name="deskripsi" rows="3" cols="100" class="form-control" id="alamat" maxlength="999" style="resize:none"><?php
                            if(isset($_GET['id_event'])){
                                echo $deskripsi;
                            } ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Tanggal : </label>
                            <input class="form-control" id="date" name="tanggal" placeholder="MM/DD/YYY" type="date" value="<?php
                            if(isset($_GET['id_event'])){
                                echo $tanggal;
                            } ?>" />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Waktu : </label>
                            <input class="form-control" id="time" name="waktu" placeholder="HH:MM" type="time" value="<?php
                            if(isset($_GET['id_event'])){
                                echo $waktu;
                            } ?>" />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Jumlah Peserta : </label>
                            <input name="jumlah_peserta" type="number" class="form-control" id="jumlah_peserta" value="<?php
                            if(isset($_GET['id_event'])){
                                echo $jumlah_peserta;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Lokasi : </label>
                            <textarea name="lokasi" rows="3" cols="100" class="form-control" id="lokasi" maxlength="999" style="resize:none"><?php
                            if(isset($_GET['id_event'])){
                                echo $lokasi;
                            } ?></textarea>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Biaya : </label>
                            <input name="biaya" type="text" class="form-control" id="biaya" value="<?php
                            if(isset($_GET['id_event'])){
                                echo $biaya;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Penanggung Jawab : </label>
                            <select name="pj_event" class="form-control" id="pj_event" value="<?php echo $pj_event; ?>">
                                <?php

                                $cat=mysql_query("SELECT id_member, nama_member FROM tb_member");

                                while($c=mysql_fetch_array($cat)){
                                    $id_member = $c['id_member'];
                                    $nama_member = $c['nama_member'];
                                ?>
                                <option value="<?php echo $id_member;?>"><?php echo $nama_member;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Banner Event :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="banner_event" type="file" id="foto">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="success"></div>
                    <?php if(isset($_GET['id_event'])){
                        echo "<button name=\"edit_event\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Event</button>";
                    }
                    else {
                        echo "<button name=\"tambah_event\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Event</button>";
                    } ?>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/custom.js"></script>

</body>
</html>