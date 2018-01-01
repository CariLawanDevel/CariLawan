<?php
session_start();

include "_config.php";

$id_member = $_SESSION['id_member'];

$tampil=mysql_query("SELECT * FROM tb_member, tb_user WHERE tb_member.id_member=tb_user.id_member AND tb_member.id_member='$id_member'");
$baris=mysql_fetch_array($tampil);

$nama_member=$baris['nama_member'];
$username=$baris['username'];
$jenis_kelamin=$baris['jenis_kelamin'];
$alamat=$baris['alamat'];
$no_hp=$baris['no_hp'];
$email=$baris['email'];
$hobi=$baris['hobi'];
$bio=$baris['bio'];
$foto=$baris['foto'];

if(isset($_POST['edit'])) {
    $nama_member=$_POST['nama_member'];
    $username=$_POST['username'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $hobi=$_POST['hobi'];
    $bio=$_POST['bio'];
    $foto = rand(1000,100000)."-".$_FILES['foto']['name'];
    $foto_loc = $_FILES['foto']['tmp_name'];
    $folder="images/foto/";
    move_uploaded_file($foto_loc,$folder.$foto);

    $hasil=mysql_query("UPDATE tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio', foto='$foto' WHERE id_member='$id_member'");
    $hasil_user=mysql_query("UPDATE tb_user SET username='$username' WHERE id_member='$id_member'");
    if($hasil && $hasil_user){
        header("location:profile.php");
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

    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container mb-4 mt-4">
        <h1 class="mt-4 mb-3">New Event</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3 class="my-3">Ubah Profil</h3>
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama : </label>
                            <input name="nama_member" type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." value="<?php echo $nama_member; ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username : </label>
                            <input name="username" type="text" class="form-control" id="username" required data-validation-required-message="Please enter your username." value="<?php echo $username; ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Jenis Kelamin :</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email :</label>
                            <input name="email" type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nomor Telepon :</label>
                            <input name="no_hp" type="phone" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." value="<?php echo $no_hp; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Hobi :</label>
                            <input name="hobi" type="text" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." value="<?php echo $hobi; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Alamat :</label>
                            <textarea name="alamat" rows="3" cols="100" class="form-control" id="alamat" required data-validation-required-message="Please enter your address" maxlength="999" style="resize:none"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Bio :</label>
                            <textarea name="bio" rows="3" cols="100" class="form-control" id="bio" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"><?php echo $bio; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Foto Profil :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="foto" type="file" id="foto">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button name="edit" type="submit" class="btn btn-primary" id="edit">Ubah Profil</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '_footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/custom.js"></script>

</body>
</html>