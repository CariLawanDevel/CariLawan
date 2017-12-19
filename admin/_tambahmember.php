<?php

if(isset($_POST['tambah_member'])) {
    $nama_member=$_POST['nama_member'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $email = $_POST['email'];
    $hobi=$_POST['hobi'];
    $bio=$_POST['bio'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $hasil=mysql_query("INSERT INTO tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio'");
    if($hasil){
        $get_id=mysql_query("SELECT id_member FROM tb_member WHERE nama_member='$nama_member' AND email='$email'") or die (error_reporting());
        $c=mysql_fetch_array($get_id);
        $id_member=$c['id_member'];

        $join=mysql_query("INSERT INTO tb_user SET id_member='$id_member', username='$username', password='$password', level='member'");
        if($join){
            header("location:manage.php?page=member");
        }
    }
} 

if(isset($_GET['id_member'])) {
    $id_member=$_GET['id_member'];

    $hasil=mysql_query("SELECT * FROM tb_member, tb_user WHERE tb_member.id_member=tb_user.id_member AND tb_member.id_member='$id_member'");
    $c=mysql_fetch_array($hasil);
    $nama_member=$c['nama_member'];
    $jenis_kelamin=$c['jenis_kelamin'];
    $alamat=$c['alamat'];
    $no_hp=$c['no_hp'];
    $email = $c['email'];
    $hobi=$c['hobi'];
    $bio=$c['bio'];
    $username=$c['username'];
}
if(isset($_POST['edit_member'])) {
    $nama_member=$_POST['nama_member'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $email = $_POST['email'];
    $hobi=$_POST['hobi'];
    $bio=$_POST['bio'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $hasil=mysql_query("UPDATE tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio' WHERE id_member='$id_member'");
    if($hasil){
        $hasil=mysql_query("UPDATE tb_user SET username='$username', password='$password' WHERE id_member='$id_member'");
        if($hasil){
            header("location:manage.php?page=member");
        }
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
                            <label>Nama Member : </label>
                            <input name="nama_member" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $nama_member;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Jenis Kelamin : </label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $jenis_kelamin;
                            } ?>">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Alamat :</label>
                            <textarea name="alamat" rows="3" cols="100" class="form-control" id="alamat" maxlength="999" style="resize:none"><?php
                            if(isset($_GET['id_member'])){
                                echo $alamat;
                            } ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>No. HP : </label>
                            <input name="no_hp" type="text" class="form-control" id="no_hp" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $no_hp;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email : </label>
                            <input name="email" type="text" class="form-control" id="email" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $email;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Hobi : </label>
                            <input name="hobi" type="text" class="form-control" id="hobi" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $hobi;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Bio :</label>
                            <textarea name="bio" rows="3" cols="100" class="form-control" id="bio" maxlength="999" style="resize:none"><?php
                            if(isset($_GET['id_member'])){
                                echo $bio;
                            } ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username : </label>
                            <input name="username" type="text" class="form-control" id="username" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $username;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password : </label>
                            <input name="password" type="password" class="form-control" id="password" value="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                    <div id="success"></div>
                    <?php if(isset($_GET['id_member'])){
                        echo "<button name=\"edit_member\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Member</button>";
                    }
                    else {
                        echo "<button name=\"tambah_member\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Member</button>";
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