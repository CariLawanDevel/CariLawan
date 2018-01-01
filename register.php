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

    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<?php

include('_config.php');

if(isset($_POST['register'])) {
    $nama_member=$_POST['nama_depan']." ".$_POST['nama_belakang'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $hobi=$_POST['hobi'];
    $bio=$_POST['bio'];
    $username=$_POST['username'];
    if($_POST['password_1']==$_POST['password_2']){
        $password=$_POST['password_1'];
    }

    $hasil=mysql_query("INSERT INTO tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio'");
    if($hasil){
        $get_id=mysql_query("SELECT id_member FROM tb_member WHERE email='$email'") or die (error_reporting());
        $c=mysql_fetch_array($get_id);
        $id_member=$c['id_member'];

        $hasil_user=mysql_query("INSERT INTO tb_user SET username='$username', password='$password', level='member', id_member='$id_member'");
        if($hasil_user){
            header("location:login.php");
        }
    }
} 
?>

<body class="bg-dark">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-center">Daftar Member Cari Lawan</div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="nama">Nama Depan</label>
                                <input name="nama_depan" class="form-control" id="namaDepan" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Depan">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputLastName">Nama Belakang</label>
                                <input name="nama_belakang" class="form-control" id="namaBelakang" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Belakang">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input name="email" class="form-control" id="email" type="text" aria-describedby="nameHelp" placeholder="Masukkan Email">
                            </div>
                            <div class="col-md-6">
                                <label for="noHp">No. HP</label>
                                <input name="no_hp" class="form-control" id="noHp" type="phone" aria-describedby="nameHelp" placeholder="Masukkan Nomor HP">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Jenis Kelamin :</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hobi">Hobi</label>
                                <input name="hobi" class="form-control" id="hobi" type="text" aria-describedby="nameHelp" placeholder="Masukkan Hobi">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" type="text" aria-describedby="emailHelp" placeholder="Masukkan Alamat" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" class="form-control" id="bio" type="text" aria-describedby="emailHelp" placeholder="Masukkan Bio" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" class="form-control" id="username" type="text" aria-describedby="emailHelp" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password_1" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Confirm password</label>
                                <input name="password_2" class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                            </div>
                        </div>
                    </div>
                    <button name="register" class="btn btn-primary btn-block">Daftar</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.php">Sudah punya akun ? Login di sini</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>