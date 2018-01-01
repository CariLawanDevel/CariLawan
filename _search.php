<?php

if(isset($_POST['search'])) {
	if(preg_match("^/[A-Za-z]+/", $_POST['search'])){ 
		$search = $_POST['search'];
		$hasil=mysql_query("SELECT * FROM tb_event WHERE nama_event LIKE '$nama_event'");
		$c=mysql_fetch_array($get_id);
        $id_event=$c['id_event'];
	} 
    // $tanggal = date('Y-m-d H:i:s');

    // $nama_event=$_POST['nama_event'];
    // $kategori=$_POST['kategori'];
    // $deskripsi=$_POST['deskripsi'];
    // $tanggal=$_POST['tanggal'];
    // $waktu=$_POST['waktu'];
    // $jumlah_peserta=$_POST['jumlah_peserta'];
    // $lokasi=$_POST['lokasi'];
    // $biaya=$_POST['biaya'];
    // $banner_event = rand(1000,100000)."-".$_FILES['banner_event']['name'];
    // $banner_loc = $_FILES['banner_event']['tmp_name'];
    // $folder="images/event/";
    // move_uploaded_file($banner_loc,$folder.$banner_event);

    // $hasil=mysql_query("INSERT INTO tb_event SET nama_event='$nama_event', id_kategori='$kategori', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', jumlah_peserta='$jumlah_peserta', lokasi='$lokasi', biaya='$biaya', banner_event='$banner_event', pj_event='$id_member'");
    // if($hasil){
    //     echo "berhasil get member";
    //     $get_id=mysql_query("SELECT id_event FROM tb_event WHERE nama_event='$nama_event' AND deskripsi='$deskripsi'") or die (error_reporting());
    //     $c=mysql_fetch_array($get_id);
    //     $id_event=$c['id_event'];

    //     $join=mysql_query("INSERT INTO tb_join SET id_member='$id_member', id_event='$id_event', tanggal_join='$tanggal'");
    //     if($join){
    //         header("location:dashboard.php");
    //     }
    // }
} 

?>

<div class="card mb-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button name="search" class="btn btn-secondary" type="submit">Go!</button>
            </span>
        </div>
    </div>
</div>